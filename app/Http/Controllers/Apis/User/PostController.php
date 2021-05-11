<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Model\Post;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Complaints;
use App\Http\Requests\ComplaintsRequest;
use App\Http\Requests\User\CommentRequest;

class PostController extends Controller
{


    public function create_comments(CommentRequest $req, $id){
        
        $comments = Post::find($id);
        if(is_null($comments)){
            return response()->json(['the post is not fount !!'],404);
        }
        $comments = Comment::create([
             'content' => $req->content,
             'user_id' => $req->user_id,
             'post_id' => $req->post_id
         ]);
         return response()->json([$comments],200);
 
     }

     public function update_comments(CommentRequest $req, $id){
         $comments = Comment::find($id);

         $comments->update([
            'content' => $req->content,
            'user_id' => $req->user_id,
            'post_id' => $req->post_id
         ]);
         return response()->json([$comments],200);
     }

     public function complaints(){
        $complaints = Complaints::get();
        return response()->json([$complaints],200);
     }

}
