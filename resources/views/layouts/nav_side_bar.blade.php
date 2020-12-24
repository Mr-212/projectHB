
<aside class="left-sidebar  position-fixed" data-sidebarbg="skin6" style="padding-top:0px !important;">

    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand justify-content-center" href="index.html">
                <b class="logo-icon">
                    <img src="https://dreamamerica.com/assets/images/logo.png" alt="homepage" class="dark-logo" />
                </b>

            </a>

            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
               href="javascript:void(0)"><i class="ti-menu ti-close"></i>
            </a>
        </nav>
    </header>

    {{--</a>--}}
    <div class="scroll-sidebar">

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">

            <ul id="sidebarnav">
                <li>

                </li>
                <!-- User Profile-->
                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="index.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 far fa-clock fa-fw" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">PortfolioTable</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-grid font-18"></i
                        ><span class="hide-menu">Outstanding Items</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{url('/items/outstanding/before_dd')}}" class="sidebar-link">
                                <i class="fa fa-angle-double-left"></i>
                                <span class="hide-menu"> Before DD </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('/items/outstanding/after_dd')}}" class="sidebar-link">
                                <i class="fa fa-angle-double-right"></i>
                                <span class="hide-menu"> Before Closing </span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{url('/portfolio')}}" aria-expanded="false">
                    <i class="mr-3 far fa-clock fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">Portfolio</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('house/sold')}}" class="sidebar-link">
                        <i class="fa fa-check"></i>
                        <span class="hide-menu"> Sold Houses </span></a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('house/cancelled')}}" class="sidebar-link">
                        <i class="fa fa-eye-slash"></i>
                        <span class="hide-menu"> Cancelled Houses </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('house/dropout')}}" class="sidebar-link">
                        <i class="fa fa-minus"></i>
                        <span class="hide-menu"> Drop Out Clients </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('house/move_out')}}" class="sidebar-link">
                        <i class="fa fa-minus"></i>
                        <span class="hide-menu"> Move Out </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('house/evicted')}}" class="sidebar-link">
                        <i class="fa fa-minus"></i>
                        <span class="hide-menu"> Evicted </span>
                    </a>
                </li>

                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">--}}
                        {{--<i class="icon-list font-18"></i--}}
                        {{--><span class="hide-menu">PortfolioTable</span>--}}
                    {{--</a>--}}
                    {{--<ul aria-expanded="false" class="collapse first-level">--}}
                        {{--<li class="sidebar-client">--}}
                            {{--<a href="{{url('house/sold')}}" class="sidebar-link">--}}
                                {{--<i class="icon-drop"></i>--}}
                                {{--<span class="hide-menu"> Sold Houses </span></a>--}}
                        {{--</li>--}}
                        {{--<li class="sidebar-client">--}}
                            {{--<a href="{{url('house/cancelled')}}" class="sidebar-link">--}}
                                {{--<i class="icon-drop"></i>--}}
                                {{--<span class="hide-menu"> Canceled Houses </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="sidebar-client">--}}
                            {{--<a href="{{url('house/dropouts')}}" class="sidebar-link">--}}
                                {{--<i class="icon-drop"></i>--}}
                                {{--<span class="hide-menu"> Drop Out Houses </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                       {{--href="{{url('/items/outstanding/before_dd')}}" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-table" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Outstanding Items</span>--}}
                    {{--</a>--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                       {{--href="{{url('/items/outstanding/before_dd')}}" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-table" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Outstanding Items</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link" href="icon-fontawesome.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-font" aria-hidden="true">--}}

                        {{--</i>--}}
                        {{--<span class="hide-menu">Icon</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="map-google.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-globe" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Google Map</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="blank.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-columns" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Blank</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="sidebar-client">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="404.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-info-circle" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Error 404</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>