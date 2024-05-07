<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\message\MessageService;
use App\Http\Services\message\SMS\SmsService;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Cryptommer\Smsir\Objects\VerifyResponse;
use Cryptommer\Smsir\Smsir;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Melipayamak;
use Melipayamak\MelipayamakApi;

class loginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request)
    {
        $inputs = $request->all();

        //check id is email or not
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['id'])->first();
            if (empty($user)) {
                $newUser['email'] = $inputs['id'];
            }
        } //check id is mobile or not
        elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])) {
            $type = 0; // 0 => mobile;


            // all mobile numbers are in on format 9** *** ***
            $inputs['id'] = ltrim($inputs['id'], '0');
            $inputs['id'] = substr($inputs['id'], 0, 2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);

            $user = User::where('mobile', $inputs['id'])->first();
            if (empty($user)) {
                $newUser['mobile'] = $inputs['id'];
            }
        } else {
            $errorText = 'شناسه ورودی شما نه شماره موبایل است نه ایمیل';
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => $errorText]);
        }

        if (empty($user)) {
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;
            $user = User::create($newUser);
        }

        //create otp code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['id'],
            'type' => $type,
        ];

        Otp::create($otpInputs);

        //send sms or email

        if ($type == 0) {
            try {
                $send = smsir::Send();
                $parameter = new \Cryptommer\Smsir\Objects\Parameters('Code', $otpCode);
                $parameters = array($parameter);
                /**
                 * @required string $mobile
                 * @required int $templateId
                 * @required Parameters[] $parameters
                 * @returns VerifyResponse
                 */
                $sendSms = $send->Verify("0" . $user->mobile, 100000, $parameters);
            } catch (\Exception $e) {
                echo $e;
            }
        } elseif ($type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما :  $otpCode",
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'hamedshop');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['id']);

            $messageService = new MessageService($emailService);
            $messageService->send();
        }
        return redirect()->route('auth.customer.login-confirm-form', $token);
    }

    public function loginConfirmForm($token)
    {
        $otp = Otp::where('token', $token)->first();
        if(empty($otp))
        {
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        return view('customer.auth.login-confirm', compact('token', 'otp'));
    }

    public function loginConfirm($token,LoginRegisterRequest $request)
    {
        $inputs=$request->all();
        $otp=Otp::where('token',$token)
            ->where('used',0)
            ->where('created_at','>=',Carbon::now()->subMinute(5)->toDateString())
            ->first();
        if (empty($otp)){
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        //if otp not matched
        if ($otp->otp_code !== $inputs['otp']){
            return redirect()->route('auth.customer.login-confirm-form',$token)->withErrors(['otp' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        //if everything OK
        $otp->update(['used'=>1]);

        $user=$otp->user()->first();

        if ($otp->type==0 && empty($user->mobile_verified_at)){
            $user->update([
                'mobile_verified_at'=>Carbon::now()
            ]);
        }elseif ($otp->type==1 && empty($user->email_verified_at)){
            $user->update([
                'email_verified_at'=>Carbon::now()
            ]);
        }
        \Auth::login($user);

        return redirect()->route('customer.home');
    }


    public function loginResendOtp($token)
    {
        $otp = Otp::where('token', $token)->where('created_at', '<=', Carbon::now()->subMinutes(5)->toDateTimeString())->first();

        if(empty($otp))
        {
            return redirect()->route('auth.customer.login-register-form', $token)->withErrors(['id' => 'ادرس وارد شده نامعتبر است']);
        }



        $user = $otp->user()->first();
        //create otp code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $otp->login_id,
            'type' => $otp->type,
        ];

        Otp::create($otpInputs);

        //send sms or email

        if($otp->type == 0){
            //send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setText("مجموعه آمازون \n  کد تایید : $otpCode");
            $smsService->setIsFlash(true);

            $messagesService = new MessageService($smsService);

        }

        elseif($otp->type === 1){
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($otp->login_id);

            $messagesService = new MessageService($emailService);

        }

        $messagesService->send();

        return redirect()->route('auth.customer.login-confirm-form', $token);

    }

    public function logOut()
    {
        \Auth::logout();
        return redirect()->route('customer.home');
    }
}
