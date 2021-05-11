<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests\Admin\PostRequest;
use App\Traits\PostTrait;
use App\Model\Category;
use App\Model\Post;
use App\User;

class PostController extends Controller
{

    use PostTrait;
    
    public function index()
    {
        
        $post = Post::orderby('id','desc')->paginate(5);

        if(isset($_GET['search'])){
            $post = Post::orderby('id','desc')->where('title','like','%'.$_GET['search'].'%')->paginate(5);
        }
        return view('admin.post.index',compact('post'));
    }
    
    
    public function create_post()
    {

        $post = Post::all();
        $category = Category::select(['id','name'])->get();
        return view('admin.post.create',compact(['post','category']));
    }
    
    public function create_post_store(PostRequest $request)
    {
        //dd($request);
       $file_name = $this->PostTrait($request->image,'uploade\admin\image');

     
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $file_name,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);
       
        return redirect()->route('index')->with('message','the post is successfly');
    }
    
    public function update_post($id)
    {

        $post = Post::findOrFail($id);
        $category = Category::select('id','name')->get();
    
        return view('admin.post.update',compact(['category','post']));
    }

    public function update_post_store(PostRequest $req,$id){

        $file_name = $this->PostTrait($req->image,'uploade\admin\image');

        //check data
        $update_post = Post::find($id);
        if(!$update_post){
            return redirect()->back();
        }


        //update data 
        $update_post->update([
            'title' => $req->title,
            'content' => $req->content,
            'image' => $file_name,
            'category_id' => $req->category_id,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('index')->with('message','the post is updated !!');
    }

    public function show_post($id){
        $post = Post::find($id);
        return view('admin.post.show',compact('post'));
    }

    public function delete_post($id){
        $post = Post::find($id)->delete();
        return redirect()->back();
    }


    
}
