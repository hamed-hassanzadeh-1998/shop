<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
}
