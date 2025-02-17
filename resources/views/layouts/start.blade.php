<!DOCTYPE html>
<html lang="en">

    @include('backend.partials.head')
    @stack('head')


<body class="sb-nav-fixed">
    @include('backend.partials.navbar')
    <div id="layoutSidenav">
        @include('backend.partials.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('backend.partials.footer')
        </div>
    </div>
    @include('backend.partials.script')
    @stack('script')
</body>

</html>
