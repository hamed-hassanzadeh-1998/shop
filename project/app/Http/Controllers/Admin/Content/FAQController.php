<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\FaqRequest;
use App\Models\Content\FAQ;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::query()
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);
        return view('admin.content.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $inputs=$request->all();
        FAQ::create($inputs);
        return redirect()
            ->route('admin.content.faq.index')
            ->with('swal-success', 'پرسش متداول جدید شما با موفقیت ثبت شد.');
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
    public function edit(FAQ $faq)
    {
        return view('admin.content.faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, FAQ $faq)
    {
        $inputs=$request->all();
        $faq->update($inputs);
        return redirect()
            ->route('admin.content.faq.index')
            ->with('swal-success', 'پرسش متداول جدید شما با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()
            ->route('admin.content.faq.index')
            ->with('swal-success', 'پرسش متداول جدید شما با موفقیت حذف شد.');
    }
    public function status(FAQ $faq): JsonResponse
    {
        $faq->status = $faq->status === 0 ? 1 : 0;
        $result = $faq->save();
        if ($result) {
            if ($faq->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
