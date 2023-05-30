<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazer</title>
    @include('front.layouts.style')
</head>

<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">

            @include('front.layouts.header')
            <div class="content-wrapper container">
                <div class="page-content">
                    
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('front.layouts.script')
</body>

</html>
