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

                    <div class="col-4 col-sm-6 col-md-4 col-lg-3 col-xl-2 px-1 mb-1 product_data">
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

                                {{-- <input type="hidden" class="prod_id" value="{{ $product->id }}"> --}}
                                <h6 class="m-0 product_name">{{ $product->product_name }}</h6>
                                <h6>
                                    <span class="price">৳{{ $product->price }}</span>

                                    @if ($product->regular_price)
                                        <span class="regular_price">
                                            ৳<s>{{ $product->regular_price }}</s>
                                        </span>
                                    @endif
                                </h6>

                                @if ($product->discount > 0)
                                    <div class="discount">
                                        <span>{{ $product->discount }}%</span>
                                    </div>
                                @endif


                                @php
                                    $cart = session('cart', []);
                                @endphp

                                @if (isset($cart[$product->id]))
                                
                                    <div class="w-100 d-flex qty_box">
                                        <button type="button" class="btn btn-dark">-</button>
                                        <input type="text" readonly value="1" class="w-100 text-center">
                                        <button type="button" class="btn btn-dark">+</button>
                                    </div>

                                @else
                                    <button type="button" class="btn btn-dark w-100 addToCart" data-id="{{ $product->id }}">Add to Cart</button>

                                @endif


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

            <div class="d-flex align-items-center">
                <div class="flex-grow-1 border-top"></div>
                <h4 class="mb-0 text-center" >Latest Products</h4>
                <div class="flex-grow-1 border-top"></div>
            </div>
            
            <div class="row">

                @foreach ($getLatestProduct as $product)

                    <div class="col-4 col-sm-6 col-md-4 col-lg-3 col-xl-2 px-1 mb-1 product_data">
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

                                {{-- <input type="hidden" class="prod_id" value="{{ $product->id }}"> --}}
                                <h6 class="m-0 product_name">{{ $product->product_name }}</h6>
                                <h6>
                                    <span class="price">৳{{ $product->price }}</span>

                                    @if ($product->regular_price)
                                        <span class="regular_price">
                                            ৳<s>{{ $product->regular_price }}</s>
                                        </span>
                                    @endif
                                </h6>

                                @if ($product->discount > 0)
                                    <div class="discount">
                                        <span>{{ $product->discount }}%</span>
                                    </div>
                                @endif

                                <button type="button" class="btn btn-dark w-100 addToCart" data-id="{{ $product->id }}">Add to Cart</button>

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
@push('script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.addToCart', function (e) { 
                e.preventDefault();

                var product_id = $(this).data('id');
                // alert(product_id);

                $.ajax({
                    method: "post",
                    url: "{{ url('/cart/add') }}",
                    data: {
                        'product_id' : product_id,
                    },
                    success: function (response) {
                        // alert(response.status);
                        $('#cart-count').text(response.count);
                    }
                });
                // console.log(product_id);
            });

        });

    </script>

@endpush
