<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('admin.content.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $inputs['author_id'] = 1;
        Post::create($inputs);
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست  جدید شما با موفقیت ثبت شد');
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
    public function edit(Post $post)
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post, ImageService $imageService)
    {
        $inputs = $request->all();

        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false)
                return redirect()
                    ->route('admin.content.post.index')
                    ->with('swal-error', 'آپلود عکس با خطا مواجه شد.');
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        $post->update($inputs);
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست شما با موفقیت به روز رسانی شد.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.content.post.index')
            ->with('swal-success','پست شما با موفقیت حذف شد.');
    }

    public function status(Post $post): JsonResponse
    {
        $post->status = $post->status === 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
    public function commentable(Post $post): JsonResponse
    {
        $post->commentable = $post->commentable === 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->commentable === 0) {
                return response()->json(['commentable' => true, 'checked' => false]);
            }

            return response()->json(['commentable' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
