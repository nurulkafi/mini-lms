<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>LMS</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
</body>
</html>
