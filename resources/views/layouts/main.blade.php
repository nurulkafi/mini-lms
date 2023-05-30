<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazer</title>
    @include('layouts.style')
</head>

<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar navbar-fixed">
            @include('layouts.header')
            <div id="main-content">
                <div class="page-heading">
                <h3>LMS</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
            @include('layouts.footer')
            </div>
        </div>
    </div>
    @include('layouts.script')
</body>

</html>
