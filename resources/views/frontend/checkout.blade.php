@extends('layouts.front')

@section('title')
      Checkout
@endsection

@section('content-body')
      <div class="py-3 mb-4 shadow-sm bg-warning border-top">
            <div class="container">
                  <h5 class="mb-0">
                        <a href="{{url('/')}}">Home/</a>
                        <a href="{{url('checkout')}}">Checkout</a>      
                        
                  </h5>
            </div>
      </div>
      <div class="container mt-5">
            <div class="row">
                  <div class="col-md-7">
                        <div class="card">
                              <div class="card-body">
                                    <h4>Basic Details</h4>
                                    <hr>
                                    <div class="row checkout-form">
                                          <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Enter First Name">
                                          </div>
                                          <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Enter Last Name">
                                          </div>
                                          <div class="col-md-6 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Email">
                                          </div>
                                          <div class="col-md-6 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter phone Number">
                                          </div>
                                          <div class="col-md-6 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Address">
                                          </div>
                                          <div class="col-md-6 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Optional Address">
                                          </div>
                                          <div class="col-md-6 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter City">
                                          </div>
                                          <div class="col-md-6 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter State">
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-5">
                        <div class="card">
                              <div class="card-body">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table table-striped table-bordered">
                                          <thead>
                                                <tr>
                                                      <th>Name</th>
                                                      <th>Qty</th>
                                                      <th>Price</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($cartitems as $item)
                                                <tr>
                                                      <td>{{$item->products->name}}</td>
                                                      <td>{{$item->prod_qty}}</td>
                                                      <td>{{$item->products->selling_price}}</td>
                                                      
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                                    <hr>
                                    <button class="btn btn-primary w-100">Place Order</button>
                               
                              </div>
                        </div>
                  </div>
            </div>
      </div>

@endsection