<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
       return view('hello-world');
    }

    public function dashboard() {
        return view ('pages.dashboard');
    }

    public function produk() {
        $products = DB::table('products')->count();
        $category = DB::table('product_categories')->count();
        $total_harga_produk = DB::table('products')->sum('price');
        $stok_produk = DB::table('products')->sum('stock');
        return view('pages.dashboard', ['products' => $products, 'category' => $category,
                    'total_harga_produk' => $total_harga_produk, 'stok_produk' => $stok_produk]);

    }
}
