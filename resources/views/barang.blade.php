@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Jual Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Barang</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama Barang</th>
                      <th>Lokasi</th>
                      <th>Terakhir Update</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listUser as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->lokasi}}</td>
                      <td>{{$data->updated_at}}</td>
                      <td>
                        <a href="#">
                              <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#">
                              <i class="fa fa-trash red"></i>
                        </a>
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

              <form method="POST" action="{{ route('barang.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="namaMitra">Nama Barang</label>
                    <input type="text" class="form-control" id="namaMitra" placeholder="Nama Barang" name="name">
                  </div>
                  
                  <div class="form-group">
                    <label for="jumlahHarga">Harga</label>
                    <input type="text" class="form-control" id="jumlahHarga1" placeholder="Harga" name="harga">
                  </div>

                  <div class="form-group">
                    <label for="namaLokasi">Lokasi</label>
                    <input type="text" class="form-control" id="namaLokasi1" placeholder="Masukkan Lokasi" name="lokasi">
                  </div>

                  <div class="form-group">
                    <label for="inputDeskripsi">Deskripsi</label>
                    <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                  </div>                  

                  <div class="form-group">
                    <label for="exampleInputFile">Masukkan File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Unggah</span>
                      </div>
                    </div>
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
              </form>

                </div>
              </div>
            </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection