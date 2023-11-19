@extends('layouts.main')

@section('content-customer')

<!-- Content Header (Page header) -->

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Vendor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Data Vendor</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <a href="#" class="btn btn-info btn-sm-3 mb-3">
      <i class="nav-icon fas fa-plus"></i> Tambah Data Vendor
    </a>
    <div class="container-fluid">
      <div class="card">
        <div class="card-body md-3">
          <table class="table table-bordered table-hover">
                    <thead>
                      <tr class="text-center">
                        <th style="width: 10px">No</th>
                        <th>Kode Vendor</th>
                        <th>Nama Vendor</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    @foreach ($vendors as $vs)
                    <tbody>
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $vs->code }}</td>
                        <td>{{ $vs->name }}</td>
                        <td>{{ $vs->address }}</td>
                        <td>{{ $vs->phone_number }}</td>
                        <td>{{ $vs->email }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-warning btn-sm ms-3"><i class="nav-icon fas fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm ms-3"><i class="nav-icon fas fa-trash"></i></a>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <br>
                  <br>
                  {{-- <center>
                      {!! $products->withQueryString()->Links('pagination::bootstrap-4') !!}
                  </center> --}}
        </div>
            <!-- /.card-header -->
            <!-- /.card-body -->

    </div>
</div>

</section>
  <!-- /.content -->

@endsection


