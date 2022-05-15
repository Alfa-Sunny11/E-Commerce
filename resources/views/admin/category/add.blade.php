@extends('layouts.admin')

@section('content-body')
      <div class='card'>
            <div class='card-header'>
                  <h1>Add Category</h1><br>
                 
            </div>
            <div class='card-body'>
                 <form action="{{url('insert-category')}}" method = "POST" enctype="multipart/form-data">
                       @csrf
                       <div class="row">
                             <div class="col-md-6 md-3">
                                  <label for="">Name</label>
                                  <input type="text" class="form-control" name="name"> 
                             </div>
                             <div class="col-md-6 md-3">
                                  <label for="">Slug</label>
                                  <input type="text" class="form-control" name="slug"> 
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Description</label>
                                    <textarea name="description" rows="3" class="form-control"></textarea>
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                   <label for="">Status</label>
                                   <input type="checkbox" name="status">
                             </div><br>
                             <div class="col-md-6 md-3"><br><br>
                                   <label for="">Popular</label>
                                   <input type="checkbox" name="popular">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Title</label>
                                   <input type="text" class="form-control" name="meta_title">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Keywords</label>
                                   <input type="text" class="form-control" name="meta_keywords">
                             </div><br>
                             <div class="col-md-12 md-3"><br><br>
                                   <label for="">Meta Description</label>
                                   <textarea name="meta_description" rows="10" class="form-control"></textarea>
                             </div>
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