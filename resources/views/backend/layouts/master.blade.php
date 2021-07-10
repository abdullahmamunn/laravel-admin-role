<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Admin Role Management')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.layouts.partials.styles')
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
      @include('backend.layouts.partials.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
           @include('backend.layouts.partials.header')
            <!-- header area end -->
          @yield('content')
        </div>
        <!-- main content area end -->
       @include('backend.layouts.partials.footer')
    </div>
    <!-- page container area end -->
   @include('backend.layouts.partials.scripts')
</body>
</html>
