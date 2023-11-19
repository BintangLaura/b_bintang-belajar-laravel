@extends('layouts.main')

@section('content-edit')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Produk</li>
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
              <div class="card card-primary">
                  <div class="card-header">
                      <h2 class="card-title">Edit Data Produk</h2>
                  </div>
                  <div class="card-body">
                      <form action="/product/update" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $products->id }}">
                          <div class="form-group">
                              <label>Kode Produk</label>
                              <input type="text" class="form-control" value="{{ $products->product_code }}" name="product_code" readonly>
                          </div>
                          <div class="form-group">
                              <label>Kategori Produk</label> <br>
                              <select name="category_id" class="form-control">
                                <option>-- Pilih Kategori --</option>
                                <option @if ($products->category_id == 1)
                                    @selected(true)
                                @endif value="1">Sports</option>
                                <option @if ($products->category_id == 2)
                                    @selected(true)
                                @endif value="2">Daily</option>
                                <option @if ($products->category_id == 3)
                                    @selected(true)
                                @endif value="3">Accessoris</option>
                                <option @if ($products->category_id == 4)
                                    @selected(true)
                                @endif value="4">Casual</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Nama Produk</label>
                              <input type="text" class="form-control" value="{{ $products->product_name }}" name="product_name">
                          </div>
                          <div class="form-group">
                              <label>Deskripsi Produk</label>
                              <input type="text" class="form-control" value="{{ $products->description }}" name="description">
                          </div>
                          <div class="form-group">
                              <label>Harga Produk</label>
                              <input type="text" class="form-control" value="{{ $products->price }}" name="price">
                          </div>
                          <div class="form-group">
                              <label>Diskon Produk</label>
                              <input type="text" class="form-control" value="{{ $products->discount_amount }}" name="discount_amount">
                          </div>
                          <div class="form-group">
                              <label>Stok Produk</label>
                              <input type="text" class="form-control" value="{{ $products->stock }}" name="stock">
                          </div>
                          @if ($products->image)
                              <div class="mb-3">
                                <img src="{{ url('data_img').'/'.$products->image }}" width="100">
                              </div>
                          @endif
                          <div class="form-group">
                            <label>Upload Gambar Produk</label>
                            <input type="file" class="form-control" placeholder="Masukkan Gambar Produk" name="image" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                          <div class="row">
                            <div class="col text-center">
                                <button type="button" class="btn btn-blok btn-danger btn-lg-3" onclick="history.go(-1);">Batal</button>
                                <button type="submit" class="btn btn-blok btn-primary btn-lg-3">Simpan Data</button>
                            </div>
                          </div>
                        </div>
                      </form>
                        </div>
              </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection
