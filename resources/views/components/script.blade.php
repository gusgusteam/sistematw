<!-- inicio script -->
<script src="{{ asset('plantilla/plugins/jquery/jquery.min.js') }} "></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plantilla/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plantilla/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plantilla/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plantilla/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plantilla/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plantilla/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plantilla/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plantilla/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plantilla/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('plantilla/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('plantilla/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('plantilla/dist/js/pages/dashboard.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->

<script src="{{asset('plantilla/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>// To style only selects with the my-select class
  $('.select2').select2()
</script>



<!-- DataTables  & Plugins -->
{{-- <script src="{{asset('plantilla/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plantilla/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> --}}
