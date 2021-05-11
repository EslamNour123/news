<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Complaints;
class ComplaintsController extends Controller
{
    public function complaints(){
        $complaints = Complaints::with('user')->orderBy('id','Desc')->paginate(10);
         if(isset($_GET['search'])){
        $complaints = Complaints::orderBy('id','Desc')->where('id','like','%'.$_GET['search'].'%')->paginate(10);
         }
        return view('admin.pages.complaints',compact('complaints'));
    }

    public function complaints_delete($id){
        $complaints = Complaints::find($id)->delete();
        return redirect()->back();
    }

}
