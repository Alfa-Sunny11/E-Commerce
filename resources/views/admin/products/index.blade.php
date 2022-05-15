@extends('layouts.admin')

@section('content-body')
      <div class='card'>
            <div class="card-header">
                  <h2>Products</h2>
            </div>
            <div class='card-body'>
                 <div class="table">
                        <table class="table table-borded">
                              <tr><b>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Original Price</th>
                                    <th>Selling Price</th>
                                    <th>Image</th>
                                    <th>Action</th>

                              </tr></b>
                              @foreach($products as $item)
                                          <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->category->name}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->original_price}}</td>
                                                <td>{{$item->selling_price}}</td>
                                                
                                                <td><img src="{{asset('assets/upload/products/'.$item->image)}}" alt = "Image Here" class="cate-image"></td>
                                                <td>
                                                      
                                                      <a href = "{{url('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                      <a href = "{{url('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                          </tr>
                              @endforeach  
                        </table>     
                 </div>
                 
            </div>
      </div>
@endsection