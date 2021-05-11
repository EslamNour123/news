<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Category;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    public function index_category(){
        $categories = Category::orderby('id','ASC')->paginate(5);

        if(isset($_GET['search'])){
            $categories = Category::orderby('id','ASC')->where('id','LIKE','%'.$_GET['search'].'%')->paginate(5);
        }

        return view('admin.category.index_category',compact('categories'));
    }

    public function create_category(){
        $categories = Category::all();
        return view('admin.category.create_category',compact('categories'));
    }

    public function create_category_sotre(CategoryRequest $req){
        $categories = Category::create([
            'name' => $req->name
        
        ]);
        return redirect()->route('index_category');
    }

    public function update_category($id){
        $categories = Category::findOrFail($id);
        return view('admin.category.update_category',compact('categories'));
    }

    public function update_category_store(CategoryRequest $req, $id){
        $update_cat = Category::find($id);
        if(!$update_cat){
            return redirect()->back();
        }
        $update_cat->update([
            'name' => $req->name
        ]);
        return redirect()->route('index_category');
    }

    public function delete_category($id){
        $categories = Category::find($id)->delete();
        return redirect()->back();
    }
}
