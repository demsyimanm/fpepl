@extends('layouts.master')
@section('content')

    <section class="content">

        <form action="{{URL::to('updateperusahaan')}}" method="POST">
            <div><h3 class="box-title">Update Perusahaan :</h3></div>
            <div class="panel panel-default">


                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" id="corpname" name="nama" value="{{$item->nm_lemb}}" required="">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="corpaddress" name="alamat" value="{{$item->jl}}" required="">
                                <input type="hidden" class="form-control" name="id" value="{{$item->id}}">
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Person In Charge</label>
                                <input type="text" class="form-control" id="corppost_code" name="personincharge"
                                       value="{{$item->pic}}" required="">
                            </div>
                            <div class="form-group">
                                <label>Jabatan Person In Charge</label>
                                <input type="text" class="form-control" id="corppost_code" name="jabatan" value="{{$item->jabatan_pic}}" required="">
                            </div>
                            <div class="form-group">
                                <label>Telp Kantor</label>
                                <input type="text" class="form-control" id="corptelp" name="telpon" value="{{$item->telpon}}" required="">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jenis Bisnis</label>
                                <input type="text" class="form-control" id="corpbusiness_type" name="jenisbisnis"
                                       value="{{$item->jenis}}" required="">
                            </div>
                            <div class="form-group">
                                <label>Profil</label>
                                <textarea class="form-control" rows="4" id="corpdescription" name="profil" required="">{{$item->profil}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel-footer text-right">
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>


        </div><!-- /.col (right) -->
        </div><!-- /.row -->

    </section><!-- /.content -->
    <script type="text/javascript">
        function dele(id) {
            $('#delete').modal('show');
            $('.button_modal').attr({href: id});
        };

        function update(id) {
            window.location = id;
        };
    </script>
    <div id="delete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Company</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data perusahaan ini?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <a type="button" class="btn btn-danger button_modal">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection