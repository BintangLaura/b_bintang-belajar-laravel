<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        //ambil data dari table products
        $products = DB::table('products')->paginate(3);

        //mengirim data table pegawai ke view index
        return view('pages.view-data', ['products' => $products]);
    }

    public function tambah()
    {
        //memanggil view tambah
        return view('pages.tambah');
    }

    public function store(Request $request)
    {
        //menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');

        $nama_file = time()."_".$file->getClientOriginalName();

        //isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_img';
        $file->move($tujuan_upload,$nama_file);

        //insert data ke table products
        DB::table('products')->insert([
            'product_code' => $request->kode,
            'product_name' => $request->nama,
            'category_id' => $request->kategori,
            'description' => $request->deskripsi,
            'price' => $request->harga,
            'discount_amount' => $request->diskon,
            'stock' => $request->stok,
            'image' => $nama_file
        ]);


        //alihkan halaman ke halaman product
        return redirect('/product');
    }

    public function edit($id)
    {
        // mengambil data pegawau berdasarkan id yang dipilih
        $products = DB::table('products')->where('id', $id)->get();

        //passing data product ke view edit.blade.php
        return view('pages.edit', ['products' => $products]);
    }

    public function update(Request $request)
    {
        //update foto jika mengganti foto
        if ($request->hasFile('gambar')) {
            //menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');

            $nama_file = time()."_".$file->getClientOriginalName();

            //isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_img';
            $file->move($tujuan_upload,$nama_file);

            //hapus foto lama
            $data = DB::table('products')->where('id', $request->id)->first();
            File::delete(public_path('data_img').'/'.$data->image);

            DB::table('products')->where('id', $request->id)->update([
                'image' => $nama_file
            ]);

        }

        //update data product
        DB::table('products')->where('id',$request->id)->update([
            'product_code' => $request->kode,
            'product_name' => $request->nama,
            'category_id' => $request->kategori,
            'description' => $request->deskripsi,
            'price' => $request->harga,
            'discount_amount' => $request->diskon,
            'stock' => $request->stok
        ]);

        //alihkan halaman ke halaman product
        return redirect('/product');
    }

    public function hapus($id)
    {
        //menghapus foto yang telah masuk ke folder data_img
        $data = DB::table('products')->where('id',$id)->first();
        File::delete(public_path('data_img').'/'.$data->image);

        //menghapus data produk berdasarkan id
        DB::table('products')->where('id',$id)->delete();

        //alihkan halaman ke halaman product
        return redirect('/product');
    }
}
