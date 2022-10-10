@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Pesan Kost Atau Kontrakan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Pesan Kost Atau Kontrakan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">        
        <div class="card">
              <div class="card-header">
                <h7>Pesan Kost Atau Kontrakan Yang Sedang Dalam Antrian</h7>
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Barang</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama Pemesan</th>
                      <th>Kode Pesan Kost atau Kontrakan</th>
                      <th>Tanggal Pesan</th>
                      <th>Nomor Telfon</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listMenungguKost as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->kode_pesan_kostkontrakan}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->phone}}</td>
                      <td>{{$data->status}}</td>
                      <td>
                        <a href="{{ route('pesanKostkontrakanBatal', $data->id) }}" type="button" class="btn btn btn-danger btn-xs">Batal</a>
                        |
                        <a href="{{ route('pesanKostkontrakanKonfirmasi', $data->id) }}"type="button" class="btn btn btn-success btn-xs">Konfirmasi</a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <!-- /.Form tambah jasa angkut -->

                </div>
              </div>
        </div>

        <div class="card">
              <div class="card-header">
                <h7>Pesan Kost Atau Kontrakan yang sudah di Konfirmasi dan dibatalkan</h7>
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Barang</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                    <th style="width: 10px">Id</th>
                      <th>Nama Pemesan</th>
                      <th>Kode Pesan Kost atau Kontrakan</th>
                      <th>Tanggal Pesan</th>
                      <th>Nomor Telfon</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listSelesaiKost as $data)
                    <tr>
                    <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->kode_pesan_kostkontrakan}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->phone}}</td>
                      <td>{{$data->status}}</td>
                      <td>
                        
                        @if($data->status == "SUDAH DI KONFIRMASI" || $data->status ==  "BATAL")
                        <a href="{{ route('exportkost', $data->id) }}" type="button" class="btn btn-block btn-success btn-xs">DETAIL</a>

                        @endif
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <!-- /.Form tambah jasa angkut -->

                </div>
              </div>
        </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection