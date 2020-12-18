<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- End Logo -->
        {{--<div class="navbar-header" data-logobg="skin6">--}}
            {{--<a class="navbar-brand justify-content-center" href="index.html">--}}
                {{--<b class="logo-icon">--}}
                    {{--<img src="https://dreamamerica.com/assets/images/logo.png" alt="homepage" class="dark-logo" />--}}
                {{--</b>--}}

            {{--</a>--}}
         {{----}}
            {{--<a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"--}}
               {{--href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>--}}
        {{--</div>--}}
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-none d-md-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white"
                       href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0 ">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                <li class="nav-item hidden-sm-down">
                    <form class="app-search pl-3">
                        <input type="text" class="form-control" placeholder="Search for..."> <a
                                class="srh-btn"><i class="ti-search"></i></a>
                    </form>
                </li>
            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                @livewire('navigation-dropdown')
            </ul>
        </div>
    </nav>
</header>