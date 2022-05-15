@extends('layouts.admin')

@section('content-body')
      <div class='card'>
            <div class='card-header'>
                  <h1>Add Product</h1><br>
                  
            </div>
            <div class='card-body'>
                 <form action="{{url('update-product/'.$products->id)}}" method = "POST" enctype="multipart/form-data">
                       @method('PUT')
                       @csrf
                       <div class="row">
                              <div class="col-md-12 md-3">
                                    <select class="form-select">
                                          <option selected>{{$products->category->name}}</option>
                                    
                                    </select>
                             </div>
                             <div class="col-md-6 md-3"><br><br>
                                  <label for="">Name</label>
                                  <input type="text" value="{{$products->name}}" class="form-control" name="name"> 
                             </div>
                             <div class="col-md-6 md-3"><br><br>
                                  <label for="">Slug</label>
                                  <input type="text" value="{{$products->slug}}" class="form-control" name="slug"> 
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Small Description</label>
                                    <textarea name="small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Description</label>
                                    <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                  <label for="">Original Price</label>
                                  <input type="number" value="{{$products->original_price}}" class="form-control" name="original_price"> 
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                  <label for="">Selling Price</label>
                                  <input type="number"  class="form-control" name="selling_price" value="{{$products->selling_price}}"> 
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                  <label for="">Tax</label>
                                  <input type="number" class="form-control" name="tax" value="{{$products->tax}}"> 
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                  <label for="">Quantity</label>
                                  <input type="number" class="form-control" name="qty" value="{{$products->qty}}"> 
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                   <label for="">Status</label>
                                   <input type="checkbox" name="status" {{$products->status == "1" ? 'checked':''}}>
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                   <label for="">Trending</label>
                                   <input type="checkbox" name="trending" {{$products->trending == "1" ? 'checked':''}}>
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Title</label>
                                   <input type="text" class="form-control" name="meta_title" value="{{$products->meta_title}}">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Keywords</label>
                                   <input type="text" class="form-control" name="meta_keywords" value="{{$products->meta_keywords}}">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Description</label>
                                   <textarea name="meta_description" rows="10" class="form-control">{{$products->meta_description}}</textarea>
                             </div>
                             @if($products->image)
                                    <img src="{{asset('assets/upload/products/'.$products->image)}}" alt = "Product Image">

                             @endif
                             <div class="col-md-12"><br><br>
                                   <input type="file" class="form-control" name="image">
                             </div><br>
                             <div class="col-md-12"><br><br>
                                   <button type="submit" class="btn btn-primary">Submit</button>
                             </div>

                             
                       </div>
                 </form> 
            </div>
      </div>
@endsection