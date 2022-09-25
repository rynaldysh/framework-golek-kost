@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Transaksi Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
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
                <h7>Transaksi yang sedang di proses</h7>
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Barang</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama</th>
                      <th>Kode Unik</th>
                      <th>Total</th>
                      <th>Nama Bank</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listMenunggu as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->kode_unik}}</td>
                      <td>{{"Rp.".number_format($data->total_transfer)}}</td>
                      <td>{{$data->bank}}</td>
                      <td>{{$data->status}}</td>
                      <td>
                        <a href="{{ route('transaksiBatal', $data->id) }}" type="button" class="btn btn btn-danger btn-xs">Batal</a>
                        |
                        <a href="{{ route('transaksiConfirm', $data->id) }}"type="button" class="btn btn btn-success btn-xs">Proses</a>
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
                <h7>Transaksi yang sudah di selesai dan dibatalkan</h7>
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Barang</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama</th>
                      <th>Kode Unik</th>
                      <th>Total</th>
                      <th>Nama Bank</th>
                      <th>Bukti Transfer</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listSelesai as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->kode_unik}}</td>
                      <td>{{"Rp.".number_format($data->total_transfer)}}</td>
                      <td>{{$data->bank}}</td>
                      <td><a href="{{ asset('storage/transfer/'.$data->buktiTransfer) }}" target="_blank">LIHAT BUKTI TRANSFER</a></td>
                      <td>{{$data->status}}</td>
                      <td>

                        @if($data->status == "DIKIRIM")
                        <a href="{{ route('transaksiSelesai', $data->id) }}" type="button" class="btn btn-block btn-primary btn-xs">SELESAI</a>

                        @elseif($data->status == "DIBAYAR")
                        <a href="{{ route('transaksiConfirm', $data->id) }}" type="button" class="btn btn-block btn-primary btn-xs">PROSES</a>

                        @elseif($data->status == "PROSES")
                        <a href="{{ route('transaksiDikirim', $data->id) }}" type="button" class="btn btn-block btn-success btn-xs">KIRIM</a>

                        @elseif($data->status == "SELESAI" || $data->status ==  "BATAL")
                        <a href="#" type="button" class="btn btn-block btn-success btn-xs">DETAIL</a>

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