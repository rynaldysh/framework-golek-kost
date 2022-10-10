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
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Kode Input Barang</th>
                      <th>Nama Barang</th>
                      <th>Ketersediaan Barang</th>
                      <th>Lokasi</th>
                      <th>Terakhir Update</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listUser as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->kode_input_barang}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->status}}</td>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection