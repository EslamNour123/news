<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Complaints;

class ComplaintsController extends Controller
{
   public function complaints_index(){
       $complaints = Complaints::get();
       return response()->json([$complaints],200);
   }

   public function delete_complaints($id){
       $complaints = Complaints::find($id)->delete();
       return response()->json(['the complaints is deleted']);
   }
}
