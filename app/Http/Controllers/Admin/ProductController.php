<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }
    function add(){
        $category = Category::all();
        return view('admin.products.add',compact('category'));
    }
    function insert(Request $req){
        $products = new Product();
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/upload/products/',$filename);
            $products->image = $filename;
        } 
        $products->cate_id = $req->input('cate_id');
        $products->name = $req->input('name');
        $products->slug = $req->input('slug');
        $products->small_description = $req->input('small_description');
        $products->description = $req->input('description');
        $products->original_price = $req->input('original_price');
        $products->selling_price = $req->input('selling_price');
        $products->tax = $req->input('tax');
        $products->qty = $req->input('qty');
        $products->status = $req->input('status') == TRUE ? '1':'0';
        $products->trending = $req->input('trending') == TRUE ? '1':'0';
        $products->meta_title = $req->input('meta_title');
        $products->meta_keywords = $req->input('meta_keywords');
        $products->meta_description = $req->input('meta_description');
        $products->save();
        return redirect('/products')->with('status', 'Product Added Successfully');
    }

    function edit($id){
        $products = Product::find($id);
        return view('admin.products.edit',compact('products'));
    }

    function update(Request $req, $id){
        $products = Product::find($id);
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/upload/products/',$filename);
            $products->image = $filename;
        } 
        $products->name = $req->input('name');
        $products->slug = $req->input('slug');
        $products->small_description = $req->input('small_description');
        $products->description = $req->input('description');
        $products->original_price = $req->input('original_price');
        $products->selling_price = $req->input('selling_price');
        $products->tax = $req->input('tax');
        $products->qty = $req->input('qty');
        $products->status = $req->input('status') == TRUE ? '1':'0';
        $products->trending = $req->input('trending') == TRUE ? '1':'0';
        $products->meta_title = $req->input('meta_title');
        $products->meta_keywords = $req->input('meta_keywords');
        $products->meta_description = $req->input('meta_description');
        $products->update();
        return redirect('/products')->with('status', 'Product Updated Successfully');

    }

    function delete($id){
        $products = Product::find($id);
        $products->delete();

        return redirect('/products')->with('status', 'Product Deleted Successfully');
    }
}
