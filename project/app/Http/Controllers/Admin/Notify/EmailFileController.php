<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailFileRequest;
use App\Http\Services\File\FileService;
use App\Models\Notify\Email;
use App\Models\Notify\EmailFile;
use Illuminate\Http\Request;

class EmailFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Email $email)
    {
        return view('admin.notify.email-file.index', compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Email $email)
    {
        return view('admin.notify.email-file.create', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailFileRequest $request, Email $email, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile('file')) {
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result=$fileService->moveToPublic($request->file('file'));
            $fileFormat=$fileService->getFileFormat();
        }
        if ($result===false)
        {
            return redirect()->route('admin.notify.email-file.index',$email->id)->with('swal-error','آپلود فایل با خطا مواجه شد');
        }
        $inputs['public_mail_id']=$email->id;
        $inputs['file_path']=$result;
        $inputs['file_size']=$fileSize;
        $inputs['file_type']=$fileFormat;

        $file=EmailFile::create($inputs);
        return redirect()->route('admin.notify.email-file.index',$email->id)->with('swal-success','آپلود فایل با موفقیت انجام شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(EmailFile $file)
    {
        $file->status = $file->status === 0 ? 1 : 0;
        $result = $file->save();
        if ($result) {
            if ($file->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
