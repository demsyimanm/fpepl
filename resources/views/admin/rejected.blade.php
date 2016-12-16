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
          <div class="box-header">
            <h3 class="box-title">Pengajuan KP yang Ditolak</h3>
          </div><!-- /.box-header -->
          <table id="datatable" class="table table-borderd table-striped">
            <thead>
              <tr>
                <th>Nama Pemohon</th>
                <th>Nama perusahaan</th>
                <th>Dosen Lapangan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reqs as $key)
                <tr>
                  <td>{{$key->peserta_didik->nm_pd}}</td>
                  <td>{{$key->companylist->nm_lemb}}</td>
                  <td>{{$key->companylist->pic}}</td>
                  <td>{{$key->tanggal_mulai}}</td>
                  <td>{{$key->tanggal_selesai}}</td>
                </tr>
               @endforeach
              </tbody>
            </table>
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
        function notifberhasil(){
        swal("Sukses", "Registrasi berhasil!", "success")
        }
      </script>

  <script type="text/javascript">
    $(function(){
      $("#datatable").DataTable();
    });
  </script>
 @if (Session::has('sukses'))
   <script type="text/javascript">notifberhasil();</script>
   @endif
@endsection