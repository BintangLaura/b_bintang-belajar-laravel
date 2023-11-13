@extends('layouts.main')

@section('content-2')

<!-- Content Header (Page header) -->

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">CRUD Produk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <a href="/product/tambah" class="btn btn-info btn-sm-3 mb-3">
      <i class="nav-icon fas fa-plus"></i> Tambah Data Produk
    </a>
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered table-hover table-responsive">
                    <thead>
                      <tr class="text-center">
                        <th style="width: 10px">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Harga Produk</th>
                        <th>Diskon Produk</th>
                        <th>Stok Produk</th>
                        <th>Gambar Produk</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    @foreach ($products as $p)
                    <tbody>
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $p->product_code }}</td>
                        <td>{{ $p->product_name }}</td>
                        <td>{{ $p->category_id }}</td>
                        <td>{{ $p->description }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->discount_amount}}</td>
                        <td>{{ $p->stock }}</td>
                        <td><img src="{{ url('/data_img/').'/'.$p->image }}" width="100"></td>
                        <td class="text-center">
                            <a href="/product/edit/{{ $p->id }}" class="btn btn-outline-warning btn-sm ms-3 mb-3"><i class="nav-icon fas fa-edit"></i></a>
                            <a href="/product/hapus/{{ $p->id }}" class="btn btn-outline-danger btn-sm ms-3"><i class="nav-icon fas fa-trash"></i></a>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <br>
                  <br>
                  <center>
                      {!! $products->withQueryString()->Links('pagination::bootstrap-4') !!}
                  </center>
        </div>
            <!-- /.card-header -->
            <!-- /.card-body -->

    </div>
</div>

</section>
  <!-- /.content -->

@endsection
