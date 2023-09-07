<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    @include('admin.layout.css')
    @stack('css')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.layout.navbar')
            @include('admin.layout.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @include('admin.layout.sweetalert ')
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
    @stack('js')
    @include('admin.layout.script')
</body>

</html>
