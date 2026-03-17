@extends('indexTemplete')


@section('slide_section')

    <!-- slider section -->
    <section class="container p-0">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100" src="frontend/img/img1.jpg" alt="">
            </div>
        </div>
    </section>
    <!-- end slider section -->

@endsection



@section('main_section')

    <!-- shop section -->
    <section class="shop_section layout_padding">
        <div class="container">

            <div class="d-flex align-items-center">
                <div class="flex-grow-1 border-top"></div>
                <h4 class="mb-0 text-center" >Latest Products</h4>
                <div class="flex-grow-1 border-top"></div>
            </div>
            
            <div class="row">

                @foreach ($getLatestProduct as $product)

                    <div class="col-4 col-sm-6 col-md-4 col-lg-3 col-xl-2 px-1 mb-1">
                        <div class="box">

                            <a href="#">
                                <div class="img-box mb-2">
                                    <img src="{{ asset('upload/products/' . $product->img) }}" alt="">

                                    <div class="overlay">
                                        <p class="view-product">View Product</p>
                                    </div>

                                    <div class="new">
                                        <span>New</span>
                                    </div>
                                </div>
                            </a>


                            <div class="bottom-part d-flex flex-column justify-center text-center">

                                <h6 class="m-0 product_name">{{ $product->product_name }}</h6>
                                <h6>
                                    <span class="price">৳{{ $product->price }}</span>

                                    @if ($product->regular_price)
                                        <span class="regular_price">
                                            ৳<s>{{ $product->regular_price }}</s>
                                        </span>
                                    @endif
                                </h6>

                                <div class="discount">
                                    <span>20%</span>
                                </div>

                                <button class="btn btn-dark w-100">Add to Cart</button>

                            </div>


                        </div>

                    </div>

                @endforeach

            </div>
            {{-- <div class="btn-box">
                <a href="">
                    View All Products
                </a>
            </div> --}}
        </div>
    </section>
    <!-- end shop section -->


    
    <!-- 2nd shop section -->
    <section class="container p-0">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100" src="frontend/img/img2.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="shop_section layout_padding">
        <div class="container">

            <div class="row">

                @foreach ($getLatestProduct as $product)

                    <div class="col-4 col-sm-6 col-md-4 col-lg-3 col-xl-2 px-1 mb-3">
                        <div class="box">

                            <a href="#">
                                <div class="img-box mb-2">
                                    <img src="{{ asset('upload/products/' . $product->img) }}" alt="">

                                    <div class="overlay">
                                        <p class="view-product">View Product</p>
                                    </div>

                                    <div class="new">
                                        <span>New</span>
                                    </div>
                                </div>
                            </a>


                            <div class="bottom-part d-flex flex-column justify-center text-center">

                                <h6 class="m-0 product_name">{{ $product->product_name }}</h6>
                                <h6>
                                    <span class="price">৳{{ $product->price }}</span>

                                    @if ($product->regular_price)
                                        <span class="regular_price">
                                            ৳<s>{{ $product->regular_price }}</s>
                                        </span>
                                    @endif
                                </h6>

                                <div class="discount">
                                    <span>20%</span>
                                </div>

                                <button class="btn btn-dark w-100">Add to Cart</button>

                            </div>


                        </div>

                    </div>

                @endforeach

            </div>
            {{-- <div class="btn-box">
                <a href="">
                    View All Products
                </a>
            </div> --}}
        </div>
    </section>
    <!-- end shop section -->






@endsection