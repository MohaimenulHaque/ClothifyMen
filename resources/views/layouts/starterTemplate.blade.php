<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'laravel') }} </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- Custom Font Icons CSS-->
  <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{ asset('upload/web_img/'.($getWebData->favicon ?: '')) }}">

</head>

<body>

  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>

      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">

          <!-- Navbar Header-->
          <a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase">
              <strong class="text-primary">{{ $getWebData->website_name ?: 'Laravel' }}</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">C</strong><strong>M</strong></div>
          </a>

          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">


          <!-- Log out -->
          <div class="list-inline-item logout">

            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
                <i class="icon-logout"></i>
              </a>
            </form>

          </div>


        </div>
      </div>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">




    @include('layouts.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">
            {{-- {{ Str::upper(request()->path())  }} --}}
            @yield('dashboard_title')
          </h2>
        </div>
      </div>



      @yield('main_section')






      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="no-margin-bottom">{{date('Y')}} &copy; <span class="text-primary">{{  $getWebData->website_name ?: 'Laravel' }}</span>. Developed by 
              <span class="text-primary">Mohaimenul Haque</span>
            </p>
          </div>
        </div>
      </footer>

    </div>
  </div>


  <!-- JavaScript files-->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"> </script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
  <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/charts-home.js') }}"></script> --}}
  <script src="{{ asset('admin/js/front.js') }}"></script>
</body>

</html>