<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => 'success',
            'massage' => 'Data Ditemukan',
            'data' =>$product
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 'success',
                'massage' => 'Data Ditemukan',
                'data' =>$product
            ]);
        } else {
            return response()->json([
                'status' => 'errorr',
                'massage' => 'Data Tidak Ditemukan',
                'data' =>null
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'product_code' => 'required' ,
            'category_id' => 'required' ,
            'product_name' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' ,
            'discount_amount' => 'required' ,
            'stock' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'errorr',
                'massage' => 'Data Tidak Valid',
                'data' => null
            ], 422);
        }

        $product = Product::create([
            'product_code' => $request->product_code,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock
        ]);
        return response()->json([
            'status' => 'success',
            'massage' => 'Data Telah Ditambahkan',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id) {
        $validate = Validator::make($request->all(),[
            'product_code' => 'required' ,
            'category_id' => 'required' ,
            'product_name' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' ,
            'discount_amount' => 'required' ,
            'stock' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'errorr',
                'massage' => 'Data Tidak Valid',
                'data' => $validate->errors()
            ], 422);
        }

        $product = Product::where('id', $id)->update([
            'product_code' => $request->product_code,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock
        ]);

        if ($product) {
            $product = Product::find($id);
            return response()->json([
                'status' => 'success',
                'massage' => 'Data Berhasil Diupdate',
                'data' => $product
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'errorr',
                'massage' => 'Data Gagal Dihapus',
                'data' => null
            ]);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'massage' => 'Data Berhasil Dihapus',
            'data' => null
        ]);
    }

}
