<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dist/adminlte.min.js') }}"></script>
<script src="{{ asset('js/iziToast/iziToast.min.js') }}"></script>

<!--
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/raphael/raphael.min.js"></script>
    <script src="bower_components/morris.js/morris.min.js"></script>
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
-->
<script type="text/javascript">
    //TODO Configurar cookie para controlar o menu

    @if(session('success'))
        iziToast.show({
            backgroundColor: '#0b804a',
            titleColor: '#fff',
            icon: 'ico-success revealIn',
            iconColor: 'white',
            overlay: false,
            position: 'topRight',
            message: '{{ Session::get('success') }}',
        });
    @elseif(session('warning'))
        iziToast.warning({
            backgroundColor: '#f00',
            overlay: false,
            position: 'topRight',
            message: '{{ Session::get('warning') }}',
        });
    @endif
</script>

@yield('page-js')