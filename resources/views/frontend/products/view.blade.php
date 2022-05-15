@extends('layouts.front')

@section('title', $product->name)
      
@section('content-body')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
      <div class="container">
            <h5 class="mb-0">
                  <a href="{{url('category')}}">Collection/</a>
                  <a href="{{url('category/'.$product->category->slug)}}">{{$product->category->name}}/</a>      
                  <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>
            </h5>
      </div>
</div>

<div class="container">
      <div class="card shadow product_data">
            <div class="row">
                  <div class="col-md-4 border-right">
                        <img src = "{{asset('assets/upload/products/'.$product['image'])}}" class="w-100" alt='Product Image' >
                  </div>
                  <div class="col-md-8">
                        <h2 class="mb-0">
                              {{$product['name']}}
                              @if($product->trending == "1")
                              <label style="font-size:16px" class="float-end badge bg-danger trending_tag">Trending</label>
                              @endif
                        </h2>

                        <hr>
                        <label class="me-3">Original Price : <s>{{$product['original_price']}} BDT</s></label>
                        <label class="fw-blod">Selling Price : {{$product['selling_price']}} BDT</label>
                        <p class="mt-3">
                              {!! $product['small_description'] !!}
                        </p>
                        <hr>
                        @if($product['qty'] > 0)
                              <label class="badge bg-success">In Stock</label>
                        @else 
                              <label class="badge bg-danger">Out of Stock</label>  
                        @endif
                        <div class="row mt-2">
                              <div class="col-md-2">
                                    <input type="hidden" value= "{{$product->id}}" class="prod_id">
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group quantity">
                                          <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                          <button class="input-group-text">-</button>
                                          </div>
                                          <input type="text" class="qty-input form-control" maxlength="2" max="10" value="1">
                                          <div class="input-group-append increment-btn" style="cursor: pointer">
                                          <button class="input-group-text">+</button>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-md-9">
                                    <br/>
                                    @if($product['qty'] > 0)
                                          <button class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart <i class="fa fa-shopping-cart"></i></button>                                   
                                    @endif
                                    <button class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i> </button>
                                    
                              </div>
                        </div>         
                  </div>
            </div>
            <hr>
            <div class="col-md-12" style="padding-left:20px">
                  
                  <h3>Description</h3>
                  <p class="mt-3">
                        {!! $product['description'] !!}
                  </p>
            </div>
      </div>
</div>

@endsection

