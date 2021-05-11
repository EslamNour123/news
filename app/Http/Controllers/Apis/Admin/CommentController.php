<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Comment;
class CommentController extends Controller
{
    public function index_comment(){
        $comments = Comment::paginate(3);
        return response()->json([$comments],200);
    }

    public function delete_comment($id){
        $comments = Comment::find($id)->delete();
        return response()->json(['the comment is deleted'],200);
    }
}
