<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('site.name'))</title>

    @yield('meta')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    @if (Auth::check())
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.min.css"/>
    @endif
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('partials.navbar')

    @yield('highlight')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.6.3/js/jquery.justifiedGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.5/js/lightgallery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    @if (Auth::check())
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.min.js"></script>
    @endif

    <script src="{{ elixir('js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
