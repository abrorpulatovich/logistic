<!-- jQuery 3 -->
<script src="/themes/admin/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/themes/admin/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- InputMask -->
<script src="/themes/admin/js/jquery.inputmask.js"></script>
<script src="/themes/admin/js/jquery.inputmask.date.extensions.js"></script>
<script src="/themes/admin/js/jquery.inputmask.extensions.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/themes/admin/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/themes/admin/js/raphael.min.js"></script>
<script src="/themes/admin/js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/themes/admin/js/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/themes/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/themes/admin/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/themes/admin/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/themes/admin/js/moment.min.js"></script>
<script src="/themes/admin/js/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/themes/admin/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/themes/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/themes/admin/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/themes/admin/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/themes/admin/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/themes/admin/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/themes/admin/js/demo.js"></script>
<!-- JS by dev -->
<script src="/themes/admin/js/script.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    // $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    //   checkboxClass: 'icheckbox_minimal-blue',
    //   radioClass   : 'iradio_minimal-blue'
    // })
    //Red color scheme for iCheck
    // $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    //   checkboxClass: 'icheckbox_minimal-red',
    //   radioClass   : 'iradio_minimal-red'
    // })
    //Flat red color scheme for iCheck
    // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    //   checkboxClass: 'icheckbox_flat-green',
    //   radioClass   : 'iradio_flat-green'
    // })

    //Colorpicker
    // $('.my-colorpicker1').colorpicker()
    //color picker with addon
    // $('.my-colorpicker2').colorpicker()

    //Timepicker
    // $('.timepicker').timepicker({
    //   showInputs: false
    // })
  })
</script>