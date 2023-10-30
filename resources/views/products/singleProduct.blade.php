@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Product Detail</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home</a></span> <span>Product Detail</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mb-5 ftco-animate">
                  <a href="{{ asset('asset/images/'. $product->image .'') }}" class="image-popup"><img src="{{ asset('assets/images/'. $product->image .'') }}" class="img-fluid" alt="{{$product->name}}"></a>
              </div>
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                  <h3>Creamy Latte Coffee</h3>
                  <p class="price"><span>${{ $product->price }}.90</span></p>
                  <p>{{$product->description}}</p>
                  <form action="{{ route('products.cart', ['id' => $product->id]) }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                    @csrf
                    <div class="row align-items-end">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input id="" type="text" class="form-control" name="prd_id" value="{{ $product->id }}">
                          
                        </div>
                      </div>             
                      <div class="col-md-12">
                        <div class="form-group">
                          <input id="" type="text" class="form-control" name="name" value="{{ $product->name }}">
                          
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input id="" type="text" class="form-control" name="price" value="{{ $product->price }}">
                          
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input id="" type="text" class="form-control " name="image" value="{{ $product->image }}">
                          
                        </div>
                      </div>
        
                      <div class="col-md-12">
                        <div class="form-group mt-4">
                          
                            <button type="submit" name="Submit" class="btn btn-primary py-3 px-4 text-dark">Add To Cart</button>
                          
                        </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
  </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Discover</span>
          <h2 class="mb-4">Related products</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
        @foreach ($relatedProduct as $item)
            
        
          <div class="col-md-3">
              <div class="menu-entry">
                      <a href="#" class="img" style="background-image: url({{asset('assets/images/'. $item->image .'')}});"></a>
                      <div class="text text-center pt-4">
                          <h3><a href="{{ route('products.singleProduct', $item->id) }}">{{ $item->name }}</a></h3>
                          <p>{{ $item->description }}</p>
                          <p class="price"><span>${{ $item->price }}.90</span></p>
                          <p><a href="{{ route('products.singleProduct', $item->id) }}" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                      </div>
                  </div>
          </div>

        @endforeach
      </div>
      </div>
  </section>

@endsection