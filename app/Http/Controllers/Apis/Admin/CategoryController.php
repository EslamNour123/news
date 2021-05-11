<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Category;
use App\Http\Requests\Apis\CategoryRequest;

class CategoryController extends Controller
{
    public function index_category(){
        $categories = Category::get();
        return response()->json([$categories],200);
    }

    public function create_category(CategoryRequest $req){
        $categories = Category::create($req->all());
        return response()->json([$categories],200);
    }

    public function update_category(CategoryRequest $req, $id){
        $categories = Category::find($id);
        if(is_null($categories)){
            return response()->json(['the category is not fount !!'],404);    
        }
        $categories->update($req->all());

        return response()->json([$categories],404);
    }

    public function delete_category($id){
        $categories = Category::find($id)->delete();

        return response()->json(['the category is deleted'],200);
    }
}
