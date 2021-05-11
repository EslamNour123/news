<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Model\Post;
use App\Model\Like;
use App\User;
use App\Model\Category;
use App\Model\comment;
use App\Model\Complaints;

class DashboardController extends Controller
{
    public function dashboard(){
        $posts = Post::count();
        $likes = Like::count();
        $categories = Category::count();
        $users = User::count();
        $commtents = Comment::count();
        $complaints = Complaints::count();
        return  response()->json(['posts' => $posts,'likes'=>$likes,
        'categories'=>$categories,'users'=>$users,
        'complaints'=>$complaints,'comments'=>$commtents],200);
    }

}
