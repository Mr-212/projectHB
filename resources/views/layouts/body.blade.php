
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <!-- Sidebar -->
@include('layouts.nav_top_bar')
@include('layouts.nav_side_bar')
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div class="page-wrapper">

        <!-- Main Content -->



        {{--<div class="page-breadcrumb">--}}
            {{--<div class="row align-items-center">--}}
                {{--<div class="col-md-6 col-8 align-self-center">--}}
                    {{--<h3 class="page-title mb-0 p-0">Dashboard</h3>--}}
                    {{--<div class="d-flex align-items-center">--}}
                        {{--<nav aria-label="breadcrumb">--}}
                            {{--<ol class="breadcrumb">--}}
                                {{--<li class="breadcrumb-client"><a href="#">Home</a></li>--}}
                                {{--<li class="breadcrumb-client active" aria-current="page">Dashboard</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-4 align-self-center">--}}
                    {{--<div class="text-right upgrade-btn">--}}
                        {{--<a href="https://wrappixel.com/templates/monsteradmin/"--}}
                           {{--class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Upgrade to--}}
                            {{--Pro</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="container-fluid">
            @yield('content')
        </div>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
{{--<a class="scroll-to-top rounded" href="#page-top">--}}
    {{--<i class="fas fa-angle-up"></i>--}}
{{--</a>--}}
