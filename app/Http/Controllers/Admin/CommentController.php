<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Comment;

class CommentController extends Controller
{
    public function comment(){
        $comments = Comment::orderby('id','desc')->paginate(5);

        if(isset($_GET['search'])){
            $comments = Comment::orderby('id','desc')->where('id','LIKE','%'.$_GET['search'].'%')->paginate(5);
        }

        return view('admin.post.comment',compact('comments'));
    }

    public function comment_delete($id){
        $comment = Comment::find($id)->delete();
        return redirect()->route('comment');
    }
}
