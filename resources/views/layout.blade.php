<!doctype html>
<html
  lang="{{ config('app.locale') }}"
  dir={{ (config('app.locale') == "ar") ? "rtl" : "ltr" }}
>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Something">
        <meta name="author" content="Roman Alshehri">
        <link rel="icon" href="./favicon2.ico">
  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        
        <title>Laravel @yield('title')</title>

        <!-- Fonts -->
    </head>
    <body>
        <div class="page">
          @include('partials.nav')
          @include('partials.side_bar')
          @yield('content')

        </div>
        <script src="/js/app.js"></script>

    </body>
</html>
