@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Kost atau Kontrakan</h1>
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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Kost atau Kontrakan</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama Kost atau Kontrakan</th>
                      <th>Nama Pengelola</th>
                      <th>Lokasi</th>
                      <th>Mayoritas</th>
                      <th>Total Kamar</th>
                      <th>Terakhir Update</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listUser as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->pengelola}}</td>
                      <td>{{$data->lokasi}}</td>
                      <td>{{$data->mayoritas}}</td>
                      <td>{{$data->totalkamar}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Tambah Kost atau Kontrakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <!-- /.Form tambah jasa angkut -->

              <form method="POST" action="{{ route('kostkontrakan.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="namaMitra">Nama Kost atau Kontrakan</label>
                        <input type="text" class="form-control" id="namaMitra" placeholder="Nama Kost atau Kontrakan" name="name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="namaLokasi">Lokasi</label>
                        <input type="text" class="form-control" id="namaLokasi1" placeholder="Masukkan Lokasi" name="lokasi">
                      </div>
                    </div>
                  </div>         
                  
                  <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="jumlahHarga">Harga</label>
                        <input type="text" class="form-control" id="jumlahHarga1" placeholder="Harga" name="harga">
                      </div>  
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Mayoritas</label>
                          <select class="form-control" name="mayoritas">
                            <option >- Pilih -</option>
                            <option >Mahasiswa</option>
                            <option >Pegawai</option>
                            <option >Campuran</option>                          
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="namaLokasi">Nama Pengelola</label>
                    <input type="text" class="form-control" id="namaLokasi1" placeholder="Nama Pengelola" name="pengelola">
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="jumlahHarga">Sisa Kamar</label>
                        <input type="text" class="form-control" id="jumlahHarga1" placeholder="Sisa Kamar yang tersedia" name="sisakamar">
                      </div>  
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="namaLokasi">Total Kamar</label>
                        <input type="text" class="form-control" id="namaLokasi1" placeholder="Total Kamar yang disediakan" name="totalkamar">
                      </div>
                    </div>
                  </div> 
                                          
                  <div class="form-group">
                    <label for="inputDeskripsi">Deskripsi</label>
                    <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="jumlahHarga">Listrik</label>
                        <input type="text" class="form-control" id="jumlahHarga1" placeholder="Listrik" name="listrik">
                      </div>  
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="namaLokasi">AC</label>
                        <input type="text" class="form-control" id="namaLokasi1" placeholder="AC" name="ac">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="jumlahHarga">Air</label>
                        <input type="text" class="form-control" id="jumlahHarga1" placeholder="Air" name="air">
                      </div>  
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="namaLokasi">Kamar Mandi</label>
                        <input type="text" class="form-control" id="namaLokasi1" placeholder="Kamar Mandi" name="kamarmandi">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="jumlahHarga">WiFi</label>
                        <input type="text" class="form-control" id="jumlahHarga1" placeholder="wifi" name="wifi">
                      </div>  
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="namaLokasi">Kloset</label>
                        <input type="text" class="form-control" id="namaLokasi1" placeholder="Kloset" name="kloset">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">                                 
                      <div class="form-group">
                        <label for="jumlahHarga">Bed</label>
                        <input type="text" class="form-control" id="jumlahHarga1" placeholder="Bed" name="bed">
                      </div>  
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="namaLokasi">Satpam Kost</label>
                        <input type="text" class="form-control" id="namaLokasi1" placeholder="Satpam Kost" name="satpam">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Masukkan File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
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