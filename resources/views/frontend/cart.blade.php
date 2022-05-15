@extends('layouts.front')

@section('title')
      My Cart
@endsection

@section('content-body')
      <div class="py-3 mb-4 shadow-sm bg-warning border-top">
            <div class="container">
                  <h5 class="mb-0">
                        <a href="{{url('/')}}">Home/</a>
                        <a href="{{url('cart')}}">Cart</a>      
                        
                  </h5>
            </div>
      </div>
      <div class="container my-5">
            <div class="card shadow product_data">
                  <div class="card-body">
                        @php
                              $total = 0;
                        @endphp

                        @foreach($cartItems as $item)
                              <div class="row">
                                    <div class="col-md-2">
                                          <img src= "{{asset('assets/upload/products/'.$item->products->image)}}" height="70px" width='70px' alt="Image here">
                                    </div>
                                    <div class="col-md-3 my-auto">
                                          <h6>{{$item->products->name}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                          <h6>{{$item->products->selling_price}} BDT</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                          <input type="hidden" value= "{{$item->prod_id}}" class="prod_id">
                                          @if($item->products->qty > $item->products->prod_qty)
                                                <label for="Quantity">Quantity</label>
                                                <div class="input-group quantity">
                                                      <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                      <button class="input-group-text">-</button>
                                                      </div>
                                                      <input type="text" class="qty-input form-control text-center" maxlength="2" max="10" value="{{$item->prod_qty}}">
                                                      <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                      <button class="input-group-text">+</button>
                                                      </div>
                                                </div>
                                                @php
                                                      $total += $item->products->selling_price * $item->prod_qty;
                                                @endphp
                                          @else
                                                <h6>Out of Stock</h6>      
                                          @endif      
                                    </div>
                                    <!-- <div class="col-md-2">
                                          <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                          <label for="Quantity">Quantity</label>
                                          <div class="input-group quantity">
                                                <button class="input-group-text">-</button>
                                                
                                                <input type="text" class="qty-input form-control text-center" value="{{$item->prod_qty}}">
                                                <button class="input-group-text">+</button>
                                                
                                          </div>
                                    </div> -->
                                    <div class="col-md-2 my-auto" style="padding-left:40px">
                                          <!-- <button class="btn btn-danger delete-cart-item"><i class="fas fa-cart-arrow-down"></i> Remove</button> -->
                                          <a href = "{{url('delete-cart-item/'.$item->id)}}" class="btn btn-danger delete-cart-item">Remove</a>
                                    </div>
                              </div>
                              <hr>
                              
                        @endforeach      
                  </div>
                  <div class="card-footer">
                        <h6><b>Total Price :</b> {{$total}} <b>BDT</b>
                        <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                        </h6>
                        
                  </div>
            </div>
      </div>

@endsection

