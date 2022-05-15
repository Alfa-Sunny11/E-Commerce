<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;




class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
    function add(){
        return view('admin.category.add');
    }
    function insert(Request $req){
        $category = new category();
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/upload/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE ? '1':'0';
        $category->popular = $req->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->meta_descrip = $req->input('meta_description');
        $category->save();

        return redirect('/categories')->with('status', 'Category Added Successfully');
    }
    function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    function update(Request $req, $id){
        $category = Category::find($id);
        if($req->hasFile('image')){
            $path = 'assets/upload/category'.$category->image;
            
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/upload/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE ? '1':'0';
        $category->popular = $req->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->meta_descrip = $req->input('meta_description');
        $category->update();

        return redirect('/categories')->with('status',"Category Updated Successfully");

    }
    function delete($id){
        $category = category::find($id);
        $category->delete();

        return redirect('/categories')->with('status',"Category Deleted Successfully");
    }
}
