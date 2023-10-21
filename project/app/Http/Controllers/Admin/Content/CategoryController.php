<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postCategories = PostCategory::query()
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('admin.content.category.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCategoryRequest $request,ImageService $imageService): RedirectResponse
    {
        $inputs = $request->all();
        if ($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'post-category');
            $result=$imageService->createIndexAndSave($request->file('image'));
        }
        if ($result===false)
            return redirect()
                ->route('admin.content.category.index')
                ->with('swal-error', 'آپلود عکس با خطا مواجه شد.');
        else
         $inputs['image']=$result;
        PostCategory::create($inputs);
        return redirect()
            ->route('admin.content.category.index')
            ->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory): RedirectResponse
    {
        $inputs = $request->all();
        $inputs['image'] = 'image';
        $postCategory->update($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی شما با موفقیت به روز رسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory): RedirectResponse
    {
        $postCategory->delete();
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی شما با موفقیت حذف شد.');
    }

    public function status(PostCategory $postCategory): JsonResponse
    {
        $postCategory->status = $postCategory->status === 0 ? 1 : 0;
        $result = $postCategory->save();
        if ($result) {
            if ($postCategory->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
