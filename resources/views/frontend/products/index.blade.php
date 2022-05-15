@extends('layouts.front')

@section('title')
      {{$category->name}}
@endsection

@section('content-body')
      <div class="py-5">
            <div class="py-3 mb-4 shadow-sm bg-warning border-top">
                  <div class="container">
                        <h5 class="mb-0">
                              <a href="{{url('category')}}">Collection/</a>
                              <a href="{{url('category/'.$category->slug)}}">{{$category->name}}</a>      
                        </h5>
                  </div>
            </div>
            <div class="container">
                  <div class="row">
                        <h2>{{$category->name}}</h2>
                        
                        @foreach($product as $prod)
                              <div class="col-md-3 md-3">
                                    
                                    <a href = "{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                                          <div class="card">
                                                <img src = "{{asset('assets/upload/products/'.$prod->image)}}" alt='Product Image' >
                                                <div class="card-body">
                                                      <h5>{{$prod->name}}</h5>
                                                      <span class="float-start">{{$prod->selling_price}} BDT</span>
                                                      <span class="float-end"><s>{{$prod->original_price}} BDT</s></span>
                                                </div>
                                          </div>
                                    </a>
                                          
                                    
                              </div> 
                        @endforeach                  
                        
                        
                  </div>
            </div>
      </div>

@endsection