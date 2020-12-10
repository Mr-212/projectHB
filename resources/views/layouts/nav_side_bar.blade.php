<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                {{--<li class="sidebar-item">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="index.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 far fa-clock fa-fw" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Portfolio</span>--}}
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
                                <span class="hide-menu"> Before Expire </span>
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
                    <a href="{{url('house/dropouts')}}" class="sidebar-link">
                        <i class="fa fa-minus"></i>
                        <span class="hide-menu"> Drop Out Clients </span>
                    </a>
                </li>

                {{--<li class="sidebar-item">--}}
                    {{--<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">--}}
                        {{--<i class="icon-list font-18"></i--}}
                        {{--><span class="hide-menu">Portfolio</span>--}}
                    {{--</a>--}}
                    {{--<ul aria-expanded="false" class="collapse first-level">--}}
                        {{--<li class="sidebar-item">--}}
                            {{--<a href="{{url('house/sold')}}" class="sidebar-link">--}}
                                {{--<i class="icon-drop"></i>--}}
                                {{--<span class="hide-menu"> Sold Houses </span></a>--}}
                        {{--</li>--}}
                        {{--<li class="sidebar-item">--}}
                            {{--<a href="{{url('house/cancelled')}}" class="sidebar-link">--}}
                                {{--<i class="icon-drop"></i>--}}
                                {{--<span class="hide-menu"> Canceled Houses </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="sidebar-item">--}}
                            {{--<a href="{{url('house/dropouts')}}" class="sidebar-link">--}}
                                {{--<i class="icon-drop"></i>--}}
                                {{--<span class="hide-menu"> Drop Out Houses </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="sidebar-item">--}}
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

                {{--<li class="sidebar-item">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link" href="icon-fontawesome.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-font" aria-hidden="true">--}}

                        {{--</i>--}}
                        {{--<span class="hide-menu">Icon</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="sidebar-item">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="map-google.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-globe" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Google Map</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="sidebar-item">--}}
                    {{--<a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                                             {{--href="blank.html" aria-expanded="false">--}}
                        {{--<i class="mr-3 fa fa-columns" aria-hidden="true"></i>--}}
                        {{--<span class="hide-menu">Blank</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="sidebar-item">--}}
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