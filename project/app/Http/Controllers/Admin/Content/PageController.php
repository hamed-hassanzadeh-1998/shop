<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PageRequest;
use App\Models\Content\Page;
use App\Models\Content\PostCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::query()
        ->orderBy('created_at', 'desc')
        ->simplePaginate(10);


        return view('admin.content.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $inputs=$request->all();
        Page::create($inputs);
        return redirect()->route('admin.content.page.index')->with('swal-success', 'محتوی جدید شما با موفقیت ثبت شد.');;
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
    public function edit(Page $page)
    {
        return view('admin.content.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request,Page $page)
    {
        $inputs=$request->all();
        $page->update($inputs);
        return redirect()->route('admin.content.page.index')->with('swal-success','محتوی مورد نظر شما با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.content.page.index')->with('swal-success','محتوی مورد نظر شما با موفقیت حذف شد.');
    }
    public function status(Page $page): JsonResponse
    {
        $page->status = $page->status === 0 ? 1 : 0;
        $result = $page->save();
        if ($result) {
            if ($page->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
