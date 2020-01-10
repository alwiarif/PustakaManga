<!-- ================== BEGIN BASE JS ================== -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('plugins/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('js/admin/theme/default.min.js')}}"></script>
<script src="{{asset('js/admin/apps.min.js')}}"></script>
@yield('footer-scripts')
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
@stack('scripts')
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
  $(document).ready(function() {
    App.init();
  });
</script>
