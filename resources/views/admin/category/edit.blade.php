@extends('layouts.admin')

@section('content-body')
      <div class='card'>
            <div class='card-header'>
                  <h1>Category Page</h1><br>
                  <h4>Edit Category</h4>
            </div>
            <div class='card-body'>
                 <form action="{{url('update-category/'.$category->id)}}" method = "POST" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                       <div class="row">
                             <div class="col-md-6 md-3">
                                  <label for="">Name</label>
                                  <input type="text" value="{{$category->name}}" class="form-control" name="name"> 
                             </div>
                             <div class="col-md-6 md-3">
                                  <label for="">Slug</label>
                                  <input type="text" value="{{$category->slug}}" class="form-control" name="slug"> 
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Description</label>
                                    <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                   <label for="">Status</label>
                                   <input type="checkbox" name="status" {{$category->status == "1" ? 'checked':''}} >
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                   <label for="">Popular</label>
                                   <input type="checkbox" name="popular" {{$category->popular == "1" ? 'checked':''}}>
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Title</label>
                                   <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Keywords</label>
                                   <input type="text" value="{{$category->meta_keywords}}" class="form-control" name="meta_keywords">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Description</label>
                                   <textarea name="meta_description" rows="10" class="form-control">{{$category->meta_descrip}}</textarea>
                             </div>

                             @if($category->image)
                                    <img src="{{asset('assets/upload/category/'.$category->image)}}" alt = "Category Image">

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