@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Monitoring KP
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary" style="width:200%">
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group col-md-6">
                                <label>Nama Pemohon</label>
                                <div><input class="form-control" type="text" name="namakelompok"
                                            value="{{$req->peserta_didik->nm_pd}}" readonly=""></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kelompok</label>
                                <div><input class="form-control" type="text" name="namakelompok"
                                            value="{{$kelompok->peserta_didik2->nm_pd}}" readonly=""></div>
                            </div>

                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group col-md-6">
                                <label>Perusahaan</label>
                                <input class="form-control" id="corporation" name="perusahaan"
                                       value="{{$req->companylist->nm_lemb}}" readonly="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Pembimbing Lapangan</label>
                                <div><input class="form-control" type="text" name="namakelompok"
                                            value="{{$req->companylist->pic}}" readonly=""></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box-header" style="">
                                <h3 class="box-title">Catatan Harian KP</h3>
                            </div><!-- /.box-header -->
                        </div>
                        <div class="col-md-8 col-md-offset-2" style="margin-top:2%">
                            <table id="datatable" class="table table-borderd table-striped">
                                <thead>
                                <tr>
                                    <th width="100px">Tanggal</th>
                                    <th>Konten</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $key)
                                    <tr>
                                        <td>{{$key->tanggal}}</td>
                                        <td><?php echo htmlspecialchars_decode($key->konten)?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-body pad">

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <script src="{{URL::to ('swal/dist/sweetalert.min.js')}}"></script>
                                        <script type="text/javascript">
                                            function notifberhasil() {
                                                swal("Sukses", "Registrasi berhasil!", "success")
                                            }
                                        </script>

                                        <script type="text/javascript">
                                            $(function () {
                                                $("#datatable").DataTable();
                                            });
                                        </script>
                                        @if (Session::has('sukses'))
                                            <script type="text/javascript">notifberhasil();</script>
    @endif
@endsection