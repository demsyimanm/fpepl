@extends('layouts.master')
@section('content')
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-6">
                <div><h3 class="box-title">List Entri :</h3></div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="datatable" class="table table-borderd table-striped">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Konten</th>
                                <th>Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($flag != 0)
                            {
                            ?>
                            @foreach($logs as $key)
                                <tr>
                                    <td>{{$key->tanggal}}</td>
                                    <td><?php echo htmlspecialchars_decode($key->konten)?></td>
                                    <td><button type="button" class="btn btn-danger"
                                                onclick="dele('{{URL::to('dailyLog/remove/'.$key->id)}}')">
                                            Delete
                                        </button></td>
                                </tr>
                            @endforeach
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            if($flag != 0)
                            {
                            ?>
                            @foreach($logs as $key )

                                <div id="myModal{{$key->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">DAILY LOG</h4>
                                                <h5 class="modal-title">Tanggal : {{$key->tanggal}}</h5>

                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo htmlspecialchars_decode($key->konten)?></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                        onclick="dele('{{URL::to('dailyLog/remove/'.$key->id)}}')">
                                                    Delete
                                                </button>
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
                    <div><h3 class="box-title">Input Aktifitas Harian</h3></div>
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
                                    <input type="text" class="form-control pull-right" id="reservation" name="tanggal" required="">
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div><!-- /.box-body -->
                        <div class="box-header">
                            <h3 class="box-title">Isi Entri :</h3>
                            <!-- tools box -->
                        </div><!-- /.box-header -->
                        <div class="box-body pad">

                            <textarea id="editor1" name="konten" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>

                            {{csrf_field()}}
                            <button type="submit" class="btn btn-primary btn-block margin-bottom">SUBMIT</button>
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

                $("#datatable").DataTable({
                    "lengthChange": false,
                    "info": false,
                    "ordering": false
                });

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();

            //Date range picker
            $('#reservation').datepicker();


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
        function dele(id) {
            $('#delete').modal('show');
            $('.button_modal').attr({href: id});
        }
        ;
    </script>
@endsection