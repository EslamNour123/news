<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.pages.dashboard',compact(['posts','likes','commtents','categories','users','complaints']));
    }
}
