@extends('layouts.master')
@section('content')
        <section class="content-header">
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">List Entri</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
          <?php 
            if($flag != 0)
            {
          ?>
            @foreach($logs as $key)
            <li><a data-toggle="modal" data-target="#myModal{{$key->id_akt_kp}}" type="submit" data-id="{{$key->id_akt_kp}}">{{$key->tanggal}}</a></li>

            @endforeach  
            @foreach($logs as $key ) 
            
              <div id="myModal{{$key->id_akt_kp}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">DAILY LOG</h4>
                      <h5 class="modal-title">Tanggal : {{$key->tanggal}}</h5>
                    
                    </div>
                    <div class="modal-body">
                     <p><?php echo htmlspecialchars_decode($key->konten)?></p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger" onclick="dele('{{URL::to('dailyLog/remove/'.$key->id)}}')">Delete</button>
                    </div>
                  </div>
                </div>
              </div>      
            @endforeach  
          
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          <form action="{{URL::to('postdailylog')}}" method="POST">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Tanggal Entri :</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="tanggal">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                </div><!-- /.box-body -->     
        <div class="box-header">
                  <h3 class="box-title">Isi Entri :</h3>
                  <!-- tools box -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
              
                    <textarea id="editor1" name="konten"  class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                
                  {{csrf_field()}}
          <button type="submit"  class="btn btn-primary btn-block margin-bottom">SUBMIT</button>
            </form>       
            <?php
            }
          ?>  
                </div>
              </div><!-- /.box -->
        
        
            </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
    
  <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!--date picker--->
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
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
        $('#reservation').datepicker();
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
    <div id="delete" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Daily Log</h4>
          </div>
          <div class="modal-body">
           <p>Apakah Anda yakin ingin menghapus daily log ini?</p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            <a type="button" class="btn btn-danger button_modal">Delete</a>
          </div>
        </div>
      </div>
    </div>   
    <script type="text/javascript">
      function dele(id){
            $('#delete').modal('show');
            $('.button_modal').attr({href:id});
      };
    </script>   
@endsection