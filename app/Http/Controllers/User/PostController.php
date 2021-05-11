<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Auth;
use App\Model\Post;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Complaints;
use App\Http\Requests\ComplaintsRequest;

class PostController extends Controller
{
    public function index_post(){
        $posts = Post::with(['comments','category'])->orderBy('id','asc')->paginate(8);
        $last_posts = Post::orderby('id','desc')->limit(4)->get();
        return view('user.pages.index_post',compact(['posts','last_posts']));
    }

    public function category_post($id){
        $categories = Category::findOrFail($id);
        $posts = Post::where('category_id',$categories->id)->get();
        return view('user.pages.category_post',compact('posts'));
    }

    public function show($id){
        $show_post = Post::findOrFail($id);
        return view('user.pages.show',compact(['show_post']));
    }

    
    //comments 

    public function create_comment(CommentRequest $req, $id){
        Post::findOrFail($id);
        Comment::create([
            'content' => $req->content,
            'user_id' => Auth::user()->id,
            'post_id' => $req->post_id
        ]);
        return redirect()->back();
    }

    public function update_comment($id){
        $comments = Comment::findOrFail($id);
        return view('user.pages.update_comment',compact(['comments']));
    }

    public function update_comment_store(CommentRequest $req, $id){

        $comments = Comment::findOrFail($id);
        $comments->update([
            'content' => $req->content,
            'user_id' => Auth::user()->id,
            'post_id' => $req->post_id
        ]);
       
        return redirect()->route('show',$comments->post_id);
    }
    public function delete_comment($id){
        $comment = Comment::find($id)->delete();
        return redirect()->back();
    }




    public function contact(){

        return view('user.pages.contact');
    }

    public function contact_store(ComplaintsRequest $req){

        $complaints = Complaints::create([
            'message' => $req->message,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('contact')->with('message','the Complaints is successfly sir!!');
    }
  
}
