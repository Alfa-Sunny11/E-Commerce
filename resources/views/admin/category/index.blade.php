@extends('layouts.admin')

@section('content-body')
      <div class='card'>
            <div class="card-header">
                  <h2>Categories</h2>
            </div>
            <div class='card-body'>
                 <div class="table">
                        <table class="table table-borded">
                              <tr><b>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>

                              </tr></b>
                              @foreach($category as $item)
                                          <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td><img src="{{asset('assets/upload/category/'.$item->image)}}" alt = "Image Here" class="cate-image"></td>
                                                <td>
                                                      
                                                      <a href = "{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                                      <a href = "{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                                </td>
                                          </tr>
                              @endforeach  
                        </table>     
                 </div>
                 
            </div>
      </div>
@endsection