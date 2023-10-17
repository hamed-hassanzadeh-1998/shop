<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
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
    public function store(PostCategoryRequest $request): RedirectResponse
    {
        $inputs = $request->all();
        $inputs['slug'] = str_replace(' ', '-', $inputs['name']) . '-' . \Str::random(5);
        $inputs['image'] = 'image';
        PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index');
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
        return redirect()->route('admin.content.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory): RedirectResponse
    {
        $postCategory->delete();
        return redirect()->route('admin.content.category.index');
    }

    public function status(PostCategory $postCategory): JsonResponse
    {
        $postCategory->status = $postCategory->status === 0 ? 1 : 0;
        $result = $postCategory->save();
        if($result){
            if($postCategory->status === 0){
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
