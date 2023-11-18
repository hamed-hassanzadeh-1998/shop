<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use App\Models\Content\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unSeenComments=Comment::where('seen',0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            $unSeenComment->seen=1;
            $result=$unSeenComment->save();
        }
       $comments= Comment::query()
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);;
     return view('admin.content.comment.index',compact('comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admin.content.comment.show',compact('comment'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(Comment $comment)
    {
        $comment->status = $comment->status === 0 ? 1 : 0;
        $result = $comment->save();
        if ($result) {
            if ($comment->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }

    public function approved(Comment $comment)
    {
        $comment->approved = $comment->approved === 0 ? 1 : 0;
        $result = $comment->save();
        if ($result) {
         return  redirect()->route('admin.content.comment.index')->with('swal-success','وضعیت نظر با موفقیت تغییر کرد.');
        } else
        return  redirect()->route('admin.content.comment.index')->with('swal-error','وضعیت نظر با خطا مواجه شد.');
    }

    public function answer(CommentRequest $request,Comment $comment)
    {
        if ($comment->parent_id == null){
        $inputs=$request->all();
        $inputs['author_id']=1;
        $inputs['parent_id']=$comment->id;
        $inputs['commentable_id']=$comment->commentable_id;
        $inputs['commentable_type']=$comment->commentable_type;
        $inputs['approved']=1;
        $inputs['status']=1;
        $comment=Comment::create($inputs);
        return redirect()->route('admin.content.comment.index')->with('swal-success','پاسخ شما با موفقیت ثبت شد');
        }else{
            return redirect()->route('admin.content.comment.index')->with('swal-error','خطا');
        }
    }
}
