<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Homepage' }}</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}" type="image/x-icon">

    @if (file_exists(public_path('vendor/fog-admin/build/admin-template/manifest.json')) || file_exists(public_path('hot')))
        @vite('resources/views/admin-template/template-basic/assets/js/app.js', 'vendor/fog-admin/build/admin-template')
    @endif

    @include('fog-admin::theme.layouts.partials.styles')
</head>
<body>
<div id="validation" class="d-flex flex-column gap-2" style="position: absolute;
    right: 0;
    top: 78px; z-index: 1031">
</div>
<header>
    @include('fog-admin::theme.layouts.partials.header')
</header>
<main>

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</main>
<footer>
    @include('fog-admin::theme.layouts.partials.footer')
    @stack('footer')
    @include('fog-admin::theme.layouts.toasts')
</footer>
@include('fog-admin::theme.layouts.footer')
@stack('footer-libs')
</html>
