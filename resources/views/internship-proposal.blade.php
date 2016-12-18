@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom:5%">
        <h1>
            Pengajuan Kerja Praktik
        </h1>
        <ol class="breadcrumb">
        </ol>
    </section>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Pengajuan</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>Nama kelompok</th>
                        <th>Nama perusahaan</th>
                        <th>Dosen Lapangan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Dosen Pembimbing</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ajuan as $key)
                        <tr>
                            <td>@if($key->kelompok_pd) {{$key->kelompok_pd->nm_kel}} @endif</td>
                            <td>@if($key->companylist) {{$key->companylist->nm_lemb}} @endif</td>
                            <td>@if($key->companylist) {{$key->companylist->pic}} @endif</td>
                            <td>{{$key->tanggal_mulai}}</td>
                            <td>{{$key->tanggal_selesai}}</td>
                            <td>@if($key->dosbing){{$key->dosbing->nm_pd}}@else - @endif</td>
                            @if($key->status == 0)
                                <td>Pending</td>
                            @elseif($key->status == 1)
                                <td>Approved</td>
                            @elseif($key->status == 2)
                                <td>Rejected</td>
                            @endif
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.box-body -->
        <!--<p><strong>A</strong></p>-->
    </div>

@endsection
