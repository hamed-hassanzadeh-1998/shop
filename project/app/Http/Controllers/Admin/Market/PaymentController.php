<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Route;

class PaymentController extends Controller
{
    public function index():View
    {
        $payments = Payment::all();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function offline():View
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OfflinePayment')->get();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function online():View
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OnlinePayment')->get();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function cash():View
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\CashPayment')->get();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function canceled(Payment $payment):RedirectResponse
    {
        $payment->status = 2;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییرات شما با موفقیت اعمال شد.');
    }

    public function returned(Payment $payment):RedirectResponse
    {
        $payment->status = 3;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success','تغییرات شما با موفقیت اعمال شد.');
    }

    public function show(Payment $payment):View
    {
        return view('admin.market.payment.show', compact('payment'));
    }
}
