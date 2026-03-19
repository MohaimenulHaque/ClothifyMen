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
                <h4 class="mb-0 text-center">Latest Products</h4>
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

                            <div class="bottom-part d-flex flex-column justify-center text-center" id="bottom-part-{{ $product->id }}">

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
                                        <input type="hidden" class="product_id" value="{{ $product->id }}">

                                        <button type="button" class="btn btn-dark decrement_btn">-</button>
                                        <input type="text" readonly value="{{ $cart[$product->id]['quantity'] }}" class="w-100 text-center qty_input">
                                        <button type="button" class="btn btn-dark increment_btn">+</button>
                                    </div>

                                @else
                                    <button type="button" class="btn btn-dark w-100 addToCart" data-id="{{ $product->id }}">Add to
                                        Cart</button>

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

            // $(document).on('click', '.addToCart', function (e) {
            //     e.preventDefault();

            //     var product_id = $(this).data('id');
            //     // alert(product_id);

            //     $.ajax({
            //         method: "post",
            //         url: "{{ url('/cart/add') }}",
            //         data: {
            //             'product_id': product_id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function (response) {
            //             // alert(response.status);
            //             $('#cart-count').text(response.count);

            //         }
            //     });
            // });


            $(document).on('click', '.addToCart', function (e) {
                e.preventDefault();
                var $btn = $(this);
                var productId = $btn.data('id');

                $.ajax({
                    method: 'post',
                    url: '/cart/add',
                    data: { product_id: productId, _token: '{{ csrf_token() }}' },
                    success: function (res) {
                        // Cart count update
                        $('#cart-count').text(res.count);

                        // Bottom-part generate
                        var bottomHtml = `
                            <h6 class="m-0 product_name">${res.name}</h6>
                            <h6>
                                <span class="price">৳${res.price}</span>
                                ${res.regular_price ? `<span class="regular_price">৳<s>${res.regular_price}</s></span>` : ''}
                            </h6>
                            ${res.discount > 0 ? `<div class="discount"><span>${res.discount}%</span></div>` : ''}
                                    <div class="w-100 d-flex qty_box">
                                        <input type="hidden" class="product_id" value="${res.product_id}">
                                        <button type="button" class="btn btn-dark decrement_btn">-</button>
                                        <input type="text" readonly value="${res.quantity}" class="w-100 text-center qty_input">
                                        <button type="button" class="btn btn-dark increment_btn">+</button>
                                    </div>
                        `;

                        $('#bottom-part-' + res.product_id).html(bottomHtml);
                    }
                });
            });










            // increment
            $(document).on('click', '.increment_btn', function (e) {
                e.preventDefault();

                var parent = $(this).closest('.qty_box');
                var input = parent.find('.qty_input');
                var product_id = parent.find('.product_id').val();

                var value = parseInt(input.val());
                value = isNaN(value) ? 0 : value;

                if (value) {
                    value++;
                    input.val(value);

                    updateCart(product_id, value);
                }
            });

            // decrement
            $(document).on('click', '.decrement_btn', function (e) {
                e.preventDefault();

                var parent = $(this).closest('.qty_box');
                var input = parent.find('.qty_input');
                var product_id = parent.find('.product_id').val();

                var value = parseInt(input.val());
                value = isNaN(value) ? 0 : value;

                value--; // 🔥 allow going to 0

                if (value <= 0) {
                    // 👉 remove from UI
                    parent.html(`
                                <button type="button" class="btn btn-dark w-100 addToCart" data-id="${product_id}">
                                    Add to Cart
                                </button>
                            `);

                    updateCart(product_id, 0);
                } else {
                    input.val(value);
                    updateCart(product_id, value);
                }
            });

            // 🔥 AJAX function
            function updateCart(product_id, quantity) {
                $.ajax({
                    method: "POST",
                    url: "{{ url('/cart/update') }}",
                    data: {
                        product_id: product_id,
                        quantity: quantity
                    },
                    success: function (response) {
                        $('#cart-count').text(response.count);
                    }
                });
            }



        });




    </script>

@endpush