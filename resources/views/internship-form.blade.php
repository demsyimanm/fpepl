@extends('layouts.master')
@section('content')
        <section class="content-header">
          <h1>
            MonitoringKP
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary" style="width:200%">
        <div class="box-body">
          <div class="box-header">
            <h3 class="box-title">Pengajuan Kelompok KP</h3>
          </div><!-- /.box-header -->
            @if($cek>0)
              <div class="alert alert-danger">
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Anda sudah mengajukan Kerja Praktik
              </div>
            @endif
          <div class="box-body pad">
       
          </div>
        </div>
         <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <form action="daftarkp" method="POST">
                <label>Perusahaan</label>
                <select class="form-control" id="corporation" name="perusahaan" required="" <?php if($cek>0) {echo 'disabled';}?>>

                  <option value="0">-</option>
                      @foreach($list as $key)
                         <option value="{{$key->id}}">{{$key->nm_lemb}}</option>
                      @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Kelompok</label>
                <div>    <input type="text" name="namakelompok" required="" <?php if($cek>0) {echo 'disabled';}?>></input></div>
            
              </div>

          <br>
          <div class="row" style="width:150%">
            <div class="col-md-4">
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="text" data-provide="datepicker" class="datepicker form-control" required="" name="tanggalmulai" <?php if($cek>0) {echo 'disabled';}?> >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="text" data-provide="datepicker" class="datepicker form-control" required="" name="tanggalselesai" value="" <?php if($cek>0) {echo 'disabled';}?>>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Kelompok</label>
                <select class="form-control" name="friend" required="" <?php if($cek>0) {echo 'disabled';}?>>
                  <option value="0">-</option>
                        @foreach($mahasiswa as $key)
                         <option value="{{$key->id}}">{{$key->nm_pd}}</option>
                          @endforeach              
                    </select>
              </div>
            </div>
          </div>
        </div>
      </div>
       
      <div class="panel-footer text-right">
      {{csrf_field()}}
          <button class="btn btn-success" <?php if($cek>0) {echo 'disabled';}?>>Submit</button>
        </div>
        </form>

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