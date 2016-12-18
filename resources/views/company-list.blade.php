@extends('layouts.master')
@section('content')
    <section class="content-header">
    </section>

    <!-- Main content -->
    <div class="col-md-3">
        <div class="col-md-12">
            <section class="content">
                <div><h3 class="box-title">List Perusahaan :</h3></div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="datatable" class="table table-borderd table-striped">
                            <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $key)
                                <tr>
                                    <td><a data-toggle="modal" data-target="#myModal{{$key->id}}" type="submit"
                                           data-id="{{$key->id}}"> {{$key->nm_lemb}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <script type="text/javascript" src="js/jquery.js"></script>
                @foreach($list as $key)

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#{{$key->id}}').click(function () {
                                alert($(this).text());
                            });
                        });
                    </script>
                @endforeach
                @foreach($list as $key )

                    <div id="myModal{{$key->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{$key->nm_lemb}}</h4>
                                    <table style="width:100%">

                                        <tr>
                                            <td>Penanggung jawab</td>
                                            <td>
                                                <pre>{{$key->pic}}</pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>
                                                <pre>{{$key->jabatan_pic}}</pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Bisnis</td>
                                            <td>
                                                <pre>{{$key->jenis}}</td>
                                            </pre></tr>
                                        <tr>
                                            <td>alamat</td>
                                            <td>
                                                <pre>{{$key->jl}}</td>
                                            </pre></tr>
                                        <tr>
                                            <td>telpon</td>
                                            <td>
                                                <pre>{{$key->telpon}}</td>
                                            </pre></tr>

                                    </table>
                                </div>
                                <div class="modal-body">
                                    <h4 class="modal-title">Deskripsi perusahaan :</h4>
                                    <p>{{$key->profil}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-default"
                                            onclick="update('{{URL::to('company/update/'.$key->id)}}')">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                            onclick="dele('{{URL::to('company/remove/'.$key->id)}}')">Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </section><!-- /.content -->
        </div><!-- /.row -->
    </div><!-- /.col -->

    <div class="col-md-9">

        <section class="content">

            <form action="{{URL::to('tambahperusahaan')}}" method="POST">
                <div><h3 class="box-title">Tambah Perusahaan :</h3></div>
                <div class="panel panel-default">


                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="corpname" name="nama" value="">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="corpaddress" name="alamat" value="">
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Person In Charge</label>
                                    <input type="text" class="form-control" id="corppost_code" name="personincharge"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan Person In Charge</label>
                                    <input type="text" class="form-control" id="corppost_code" name="jabatan"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label>Telp Kantor</label>
                                    <input type="text" class="form-control" id="corptelp" name="telpon" value="">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Bisnis</label>
                                    <input type="text" class="form-control" id="corpbusiness_type"
                                           name="jenisbisnis"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label>Profil</label>
                                        <textarea class="form-control" rows="4" id="corpdescription"
                                                  name="profil"></textarea>
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
    </div>
    <script type="text/javascript">
        function dele(id) {
            $('#delete').modal('show');
            $('.button_modal').attr({href: id});
        }
        ;

        function update(id) {
            window.location = id;
        }
        ;

        $(function () {
            $("#datatable").DataTable({
                "lengthChange": false,
                "info": false,
                "ordering": false
            });

        });
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