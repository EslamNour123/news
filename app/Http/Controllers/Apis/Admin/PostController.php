<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Apis\PostRequest;
use App\Traits\PostTrait;
use App\Model\Category;
use App\Model\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    use PostTrait;

    public function index_post(){
        $posts = Post::paginate(5);
        return response()->json([$posts],200);
    }

    public function create_post(PostRequest $req){
        $file_name = $this->PostTrait($req->image,'uploade\admin\image');
        $posts =   Post::create([
            'title' => $req->title,
            'content' => $req->content,
            'image' => $file_name,
            'category_id' => $req->category_id,
            'user_id' => $req->user_id
        ]);
        return response()->json([$posts],200);
    }

    public function show_post($id){
        $posts = Post::find($id);
        if(is_null($posts)){
            return response()->json(['the post is not fount !!'],404);
        }
        return response()->json([$posts],200);
    }

    public function update_post(PostRequest $req, $id){
        $posts = Post::find($id);
        if(is_null($posts)){
            return response()->json(['the post is not fount !!'],404);
        }

        $file_name = $this->PostTrait($req->image,'uploade\admin\image');
        $posts->update([
            'title' => $req->title,
            'content' => $req->content,
            'image' => $file_name,
            'category_id' => $req->category_id,
            'user_id' => $req->user_id
        ]);
        return response()->json([$posts],200);

 
 
    }

    public function delete_post($id){
        $posts = Post::find($id)->delete();
        return response()->json(['the post is deleted !!']);
    }
}
