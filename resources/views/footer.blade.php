      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{URL::to ('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{URL::to ('plugins/morris/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{URL::to ('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{URL::to ('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{URL::to ('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{URL::to ('plugins/knob/jquery.knob.js')}}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{URL::to ('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{URL::to ('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{URL::to ('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{URL::to ('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{URL::to ('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
   
    <!-- Select2 -->
    <script src="{{URL::to ('plugins/select2/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{URL::to ('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{URL::to ('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{URL::to ('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <!-- date-range-picker -->

    <!-- bootstrap color picker -->
    <script src="{{URL::to ('plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <!-- bootstrap time picker -->
    <script src="{{URL::to ('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

    <!-- iCheck 1.0.1 -->
    <script src="{{URL::to ('plugins/iCheck/icheck.min.js')}}"></script>
    <!-- FastClick -->
 <script src="{{URL::to ('dist/js/app.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{URL::to ('dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::to ('dist/js/demo.js')}}"></script>
    <script src="{{URL::to ('plugins/datatables/datatables.bootstrap.min.js')}}"></script>
    <script src="{{URL::to ('plugins/datatables/jquery.datatables.min.js')}}"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

