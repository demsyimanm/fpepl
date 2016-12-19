@extends('layouts.master')
@section('content')
        <section class="content-header">
          <h1>
            Kelola Permohonan
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary" style="width:200%">
        <div class="box-body">
          <div class="box-header">
            <h3 class="box-title">Pengajuan Kelompok KP</h3>
          </div><!-- /.box-header -->
           
          <div class="box-body pad">
       
          </div>
        </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col-md-4">
                <label>Nama Pemohon</label>
                <div><input class="form-control" type="text" name="namakelompok"  value="{{$req->peserta_didik->nm_pd}}" readonly=""></div>
              </div>

              <div class="form-group col-md-4">
                <label>Perusahaan</label>
                <input class="form-control" id="corporation" name="perusahaan" value="{{$req->companylist->nm_lemb}}" readonly="">
              </div>
              <div class="form-group col-md-4">
                <label>Pembimbing Lapangan</label>
                <div><input class="form-control" type="text" name="namakelompok"  value="{{$req->companylist->pic}}" readonly=""></div>
              </div>
              <div class="form-group col-md-2">
                <label>Tanggal Mulai</label>
                <input type="text"  class=" form-control" name="tanggalmulai" value="{{$req->tanggal_mulai}}" readonly="" >
              </div>
              <div class="form-group col-md-2">
                <label>Tanggal Selesai</label>
                <input type="text" class=" form-control" name="tanggalselesai" value="{{$req->tanggal_selesai}}" readonly="">
              </div>
              <div class="col-md-8"></div>
              
            </div>
            <form action="" method="post">
              <div class="col-md-12" style="margin-top:1%">
                <div class="col-md-5">
                  <label>Dosen Pembimbing</label>
                  <select name="dosbing" class="form-control" required="">
                    @foreach($lecturers as $lecturer)
                      <option value="{{$lecturer->id}}">{{$lecturer->nm_pd}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12" style="margin-top:1%">
                <div class="col-md-5">
                  <label>Approval</label>
                  <select name="status" class="form-control" required="">
                      <option value="1">Terima</option>
                      <option value="2">Tolak</option>
                  </select>
                </div>
              </div>
              <div class="panel-footer text-right">
               {{csrf_field()}}
                <button class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

        <script src="{{URL::to ('swal/dist/sweetalert.min.js')}}"></script>
        <script type="text/javascript">
        function notifberhasil(){
        swal("Sukses", "Registrasi berhasil!", "success")
        }
      </script>

 @if (Session::has('sukses'))
   <script type="text/javascript">notifberhasil();</script>
   @endif
@endsection