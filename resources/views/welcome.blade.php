@extends('indexTemplete')


@section('slide_section')

    <!-- slider section -->
    <section class="slider_section">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            Gift Shop
                                        </h1>
                                        <p>
                                            Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non
                                            necessitatibus error distinctio mollitia suscipit. Nostrum fugit
                                            doloribus consequatur distinctio esse, possimus maiores aliquid repellat
                                            beatae cum, perspiciatis enim, accusantium perferendis.
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img style="width:600px" src="frontend/images/image3.jpeg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- end slider section -->

@endsection



@section('main_section')

    <!-- shop section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Products
                </h2>
            </div>
            <div class="row">

                @foreach ($getProduct as $product)
                
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 px-2">
                        <div class="box">

                            <a href="#">
                                <div class="img-box mb-2">
                                    <img src="{{ asset('upload/products/'. $product->img ) }}" alt="">

                                    <div class="overlay">
                                        <p class="view-product">View Product</p>
                                    </div>

                                    <div class="new">
                                        <span>New</span>
                                    </div>
                                </div>
                            </a>

                            
                            <div class="bottom-part d-flex flex-column justify-center text-center">

                                <h6 class="m-0">{{ $product->product_name }}</h6>
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
            <div class="btn-box">
                <a href="">
                    View All Products
                </a>
            </div>
        </div>
    </section>
    <!-- end shop section -->



    {{-- <!-- contact section -->
    <section class="contact_section ">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>
    <!-- end contact section --> --}}





@endsection