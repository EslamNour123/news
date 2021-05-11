<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\UserRequest;
use App\Traits\UserTrait;
use App\User;

class UserController extends Controller
{
    use UserTrait;

    public function index_user(){
        $users = User::orderby('id','ASC')->paginate(5);

        if(isset($_GET['search'])){
        $users = User::orderby('id','ASC')->where('id','LIKE','%'.$_GET['search'].'%')->paginate(5);
        }

        return view('admin.user.index_user',compact('users'));
    }

    public function create_user(){
        $users = User::all();
        return view('admin.user.create_user',compact('users'));
    }

    public function create_user_store(UserRequest $req){
      
        $file_name = 'uploade\admin\user/default.png';

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'image' => $file_name,
            'phone' => $req->phone,
            'role' => $req->role
        ]);
        return redirect()->route('index_user');
    }

    public function update_user($id){
        $users = User::findOrFail($id);   
        return view('admin.user.update_user',compact('users'));
    }

    public function update_user_store(UserRequest $req, $id){
        $file_name = $this->UserTrait($req->image,'uploade\admin\user'); 

        $update_user = User::find($id);
        if(!$update_user){
            return redirect()->back();
        }

        $update_user->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'image' => $file_name,
            'phone' => $req->phone,
            'role' => $req->role
        ]);
        return redirect()->route('index_user');
    }

    public function delete_user($id){
        $users = User::find($id)->delete();
        return redirect()->back();
    }

    public function login_user(){
        return view('admin.user.login_user');
    }
}
