<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section ">
        <nav class="navbar navbar-expand-lg custom_nav-container ">

            <a class="navbar-brand m-1" href="index.html">
                <span class="app_name">
                    {{config('app.name')}}
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="container m-0 p-0">
                <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ request()->is('shop') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop') }}">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="why.html">
                                Why Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>

                    <div class="user_option">

                        @if (Auth::check())

                            <!-- Log out -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                    <i class="icon-logout"></i>
                                </a>
                            </form>




                        @else

                            <a href="{{ route('login') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>Login</span>
                            </a>
                            <a href="{{ route('register') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>Register</span>
                            </a>


                        @endif

                        <a href="{{ route('add-to-cart-page') }}" class="d-flex">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <div id="cart-count" class="cart_count">{{ session('cart',[]) ? count(session('cart',[])) : 0 }}</div>
                        </a>
                        {{-- <form class="form-inline ">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form> --}}

                    </div>

                </div>
            </div>


        </nav>
    </header>
    <!-- end header section -->

    @yield('slide_section')



</div>
<!-- end hero area -->