<!DOCTYPE html>
<html lang="en">
@include('backend.partials.head')
@stack('head')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('backend.partials.navbar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- partial:partials/_footer.html -->
                @include('backend.partials.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('backend.partials.script')
    @stack('script')
    <!-- End custom js for this page -->
</body>

</html>
