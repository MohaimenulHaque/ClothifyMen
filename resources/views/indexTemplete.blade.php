<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('frontend/img/Favicon.png') }}" type="image/x-icon">

    <title> {{config('app.name', 'Laravel')}} </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />

    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">

</head>

<body>

    @include('header')
    @yield('main_section')






    <!-- footer section -->
    <section class="info_section  layout_padding2-top">
        <div class="social_container">
            <div class="social_box">

                @if(optional($getWebData)->facebook_link)
                    <a href="{{ $getWebData->facebook_link }}" target="_blank">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                @endif

                @if(optional($getWebData)->instagram_link)
                    <a href="{{ $getWebData->instagram_link }}" target="_blank">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                @endif

                @if(optional($getWebData)->youtube_link)
                    <a href="{{ $getWebData->youtube_link }}" target="_blank">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                @endif


            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
 
                    <div class="col-md-6 col-lg-4">
                        <h6>
                            NEED HELP
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box ">
                            <div class="mb-2">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>{{ $getWebData->address ?: 'Add Address' }} </span>
                            </div>
                            <div class="mb-2">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>{{ $getWebData->contact ?: '+88017XXXXXXXX' }}</span>
                            </div>
                            <div class="mb-2">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> {{ $getWebData->email ?: 'example@gmail.com' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class=" footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="">{{ $getWebData->website_name }}</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->

    </section>
    <!-- end info section -->


    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}
    {{-- <script src="{{ asset('frontend/js/custom.js') }}"></script> --}}

</body>

</html>