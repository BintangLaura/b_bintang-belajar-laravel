<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        //ambil data dari table products
        $products = Product::paginate(3);

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

        $this->validate($request, [
            'product_code' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount_amount' => 'required',
            'stock' => 'required',
            'image' => 'required'
        ]);

        //menyimpan data file yang diupload ke variabel $file
        $foto_file = $request->file('image');
        $foto_ekstensi = $foto_file->extension();
        $nama_foto = date('ymdhis').".".$foto_ekstensi;

        //isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_img';
        $foto_file->move($tujuan_upload,$nama_foto);

        Product::create([
            'product_code' => $request->product_code,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock,
            'image' => $nama_foto
        ]);
        return redirect('/product');
    }

    public function show($id) {

    }

    public function edit($id)
    {
        // mengambil data pegawau berdasarkan id yang dipilih
        $products = Product::where('id', $id)->first();

        //passing data product ke view edit.blade.php
        return view('pages.edit')->with('products', $products);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'product_code' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount_amount' => 'required',
            'stock' => 'required'
        ]);

        Product::where('id', $request->id)->update([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock
        ]);

        //update foto jika mengganti foto
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required'
            ]);

            //menyimpan data file yang diupload ke variabel $file
            $foto_file = $request->file('image');
            $foto_ekstensi = $foto_file->extension();
            $nama_foto = date('ymdhis').".".$foto_ekstensi;

            //isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_img';
            $foto_file->move($tujuan_upload,$nama_foto);

            //hapus foto lama
            $data_foto = Product::where('id', $request->id)->first();
            File::delete(public_path('data_img').'/'.$data_foto->image);

            Product::where('id', $request->id)->update([
                'image' => $nama_foto
            ]);
        }

        //alihkan halaman ke halaman product
        return redirect('/product');
    }

    public function hapus($id)
    {
        //menghapus foto yang telah masuk ke folder data_img
        $data = Product::where('id', $id)->first();
        File::delete(public_path('data_img').'/'.$data->image);

        //menghapus data produk berdasarkan id
        Product::where('id', $id)->delete();
        // DB::table('products')->where('id',$id)->delete();

        //alihkan halaman ke halaman product
        return redirect('/product');
    }
}
