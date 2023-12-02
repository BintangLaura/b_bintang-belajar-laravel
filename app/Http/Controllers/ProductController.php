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
            'product_code' => 'required|min:3',
            'category_id' => 'required',
            'product_name' => 'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'discount_amount' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'product_code.required' => 'Kode Produk Wajib Diisi',
            'product_code.min' => 'Kode Produk Minimal 3 Karakter',
            'category_id.required' => 'Kategori Wajib Diisi',
            'product_name.required' => 'Nama Produk Wajib Diisi',
            'product_name.max' => 'Nama Produk Maximal 50 Karakter',
            'description.required' => 'Deskripsi Produk Wajib Diisi',
            'description.max' => 'Deskripsi Produk Maximal 255 Karakter',
            'price.required' => 'Harga Wajib Diisi',
            'price.numeric' => 'Harga Wajib Diisi Dengan Angka',
            'discount_amount.required' => 'Diskon Wajib Diisi',
            'discount_amount.numeric' => 'Diskon Wajib Diisi Dengan Angka',
            'stock.required' => 'Stok Wajib Diisi',
            'stock.numeric' => 'Stok Wajib Diisi Dengan Angka',
            'image.required' => 'Gambar Wajib Diisi',
            'image.mimes' => 'Gambar yang diperbolehkan hanya yang berekstensi JPEG, JPG, PNG dan GIF',
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
            'product_code' => 'required|min:3',
            'category_id' => 'required',
            'product_name' => 'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'discount_amount' => 'required|numeric',
            'stock' => 'required|numeric',
        ], [
            'product_code.required' => 'Kode Produk Wajib Diisi',
            'product_code.min' => 'Kode Produk Minimal 3 Karakter',
            'category_id.required' => 'Kategori Wajib Diisi',
            'product_name.required' => 'Nama Produk Wajib Diisi',
            'product_name.max' => 'Nama Produk Maximal 50 Karakter',
            'description.required' => 'Deskripsi Produk Wajib Diisi',
            'description.max' => 'Deskripsi Produk Maximal 255 Karakter',
            'price.required' => 'Harga Wajib Diisi',
            'price.numeric' => 'Harga Wajib Diisi Dengan Angka',
            'discount_amount.required' => 'Diskon Wajib Diisi',
            'discount_amount.numeric' => 'Diskon Wajib Diisi Dengan Angka',
            'stock.required' => 'Stok Wajib Diisi',
            'stock.numeric' => 'Stok Wajib Diisi Dengan Angka',
        ]);

        //update foto jika mengganti foto
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'image.mimes' => 'Gambar yang diperbolehkan hanya yang berekstensi JPEG, JPG, PNG dan GIF'
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

        Product::where('id', $request->id)->update([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock
        ]);



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

    public function grafikTotalProduk()
    {
        $total_produk = DB::table('products')
                        ->select(DB::raw('count(*) as product_count, category_id'))
                        ->groupBy('category_id')
                        ->pluck('product_count');
        // dd($total_produk);

        $kategori = DB::table('product_categories')
                    ->select(DB::raw('category_name'))
                    ->groupBy('category_name')
                    ->pluck('category_name');
        // dd($kategori);

        $produk = DB::table('products')
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select(DB::raw('count(*) as product_count, category_name'))
                ->groupBy('category_name')
                ->get();

        return view('pages.grafik', compact('total_produk', 'kategori', 'produk'));
    }

    public function grafikTotalHargaProduk()
    {
        $total_harga = Product::selectRaw('SUM(price) as total_price, category_id')
                        ->groupBy('category_id')
                        ->pluck('total_price');
        // dd($total_harga);

        $kategori = DB::table('product_categories')
                    ->select(DB::raw('category_name'))
                    ->groupBy('category_name')
                    ->pluck('category_name');
        // dd($kategori);

        $sum_harga = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select(DB::raw('SUM(price) as harga, category_name'))
                ->groupBy('category_name')
                ->get();
        // dd($sum_harga);

        return view('pages.grafik-harga', compact('total_harga', 'kategori', 'sum_harga'));
    }

    public function grafikStokProduk()
    {
        $total_stok = Product::selectRaw('SUM(stock) as stok')
                        ->groupBy('category_id')
                        ->pluck('stok');
        // dd($total_stok);

        $kategori = DB::table('product_categories')
                    ->select(DB::raw('category_name'))
                    ->groupBy('category_name')
                    ->pluck('category_name');
        // dd($kategori);

        $sum_stok = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select(DB::raw('SUM(stock) as jmlStok, category_name'))
                ->groupBy('category_name')
                ->get();
        // dd($sum_stok);

        return view('pages.grafik-stok', compact('total_stok', 'kategori', 'sum_stok'));
    }
}
