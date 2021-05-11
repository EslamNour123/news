<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Apis\UserRequest;
use App\Traits\UserTrait;
use App\User;

class UserController extends Controller
{
    use UserTrait;
    
    public function index_user(UserRequest $req){
        $users = User::get();
        return response()->json([$users],200);
    }

    public function create_user(UserRequest $req){
        $file_name = 'uploade\admin\user/default.png';

        $users = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'image' => $file_name,
            'phone' => $req->phone,
            'role' => $req->role
        ]);
        return response()->json([$users],200);
    }

    public function update_user(UserRequest $req, $id){
        $file_name = $this->UserTrait($req->image,'uploade\admin\user'); 

        $users = User::find($id);
        if(!$users){
            return response()->json(['the user is not fount !!'],404);
        }

        $users->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'image' => $file_name,
            'phone' => $req->phone,
            'role' => $req->role
        ]);
        return response()->json([$users],200);
    }
}
