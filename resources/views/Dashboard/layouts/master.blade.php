<!doctype html>
<html lang="en" class="light-theme">
<head>
    @include('Dashboard.layouts.head')

</head>


<body>
<div class="wrapper">
    @include('Dashboard.layouts.main-sidabar')
    @include('Dashboard.layouts.main-header')

    @yield('content')
</div>
<!--end wrapper-->

    <!-- Bootstrap bundle JS -->
{{--    @include('Dashboard.layouts.footer-scripts')--}}
    <!-- Bootstrap bundle JS -->
    <script src="{{asset('Dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('Dashboard/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Dashboard/assets/js/pace.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <!--app-->
    <script src="{{asset('Dashboard/assets/js/app.js')}}"></script>
    <script src="{{asset('Dashboard/assets/js/index.js')}}"></script>
    <script>
        new PerfectScrollbar(".best-product")
    </script>
</body>

</html>
