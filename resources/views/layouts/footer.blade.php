<!-- Bootstrap core JavaScript-->
@php
    $base_url = url('/');
@endphp

{{--<script src="{{$base_url}}/adminpanal/vendor/jquery/jquery.min.js"></script>--}}
{{--<script src="{{$base_url}}/adminpanal/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

{{--<!-- Core plugin JavaScript-->--}}
{{--<script src="{{$base_url}}/adminpanal/vendor/jquery-easing/jquery.easing.min.js"></script>--}}

{{--<!-- Custom scripts for all pages-->--}}
{{--<script src="{{$base_url}}/adminpanal/js/sb-admin-2.min.js"></script>--}}

{{--<!-- Page level plugins -->--}}
{{--<script src="{{$base_url}}/adminpanal/vendor/chart.js/Chart.min.js"></script>--}}

{{--<!-- Page level custom scripts -->--}}
{{--<script src="{{$base_url}}/adminpanal/js/demo/chart-area-demo.js"></script>--}}
{{--<script src="{{$base_url}}/adminpanal/js/demo/chart-pie-demo.js"></script>--}}


<script src="{{$base_url}}/monster/assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{$base_url}}/monster/assets/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="{{$base_url}}/monster/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{$base_url}}/monster/monster-html/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="{{$base_url}}/monster/monster-html/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{$base_url}}/monster/monster-html/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{$base_url}}/monster/monster-html/js/custom.js"></script>
<!--This page JavaScript -->
<!--flot chart-->
<script src="{{$base_url}}/monster/assets/plugins/flot/jquery.flot.js"></script>
<script src="{{$base_url}}/monster/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="{{$base_url}}/monster/monster-html/js/pages/dashboards/dashboard1.js"></script>
@livewireScripts
@stack('modals')
@stack('scripts')
