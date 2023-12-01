<?php

namespace App\Http\Controllers\API;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // menampilkan semua data produk
    public function index() {
        $product    = Products::all();
            return response()->json([
                'status'=>'success',
                'message'=>'Data ditemukan',
                'data'=>$product
            ]);
    }

    // menampilkan data berdasarkan id
    public function show($id) {
        $product    = Products::find($id);
        if($product) {
            return response()->json([
                'status'=>'success',
                'message'=>'Data ditemukan',
                'data'=>$product
            ]);
        } else {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak ditemukan',
                'data'=>null
            ], 404);
        }
    }

    // membuat data
    public function store(Request $request) {
        // validasi
        $validate   = Validator::make($request->all(),[
            'product_name'=>'required',
            'category_id'=>'required',
            'product_code'=>'required',
            'price'=>'required',
            'description'=>'required',
            'unit'=>'required',
            'stock'=>'required',
            'discount'=>'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak valid',
                'data'=>null
            ], 422);
        }

        $product    = Products::create([
            'product_name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'product_code'=>$request->product_code,
            'price'=>$request->price,
            'description'=>$request->description,
            'unit'=>$request->unit,
            'stock'=>$request->stock,
            'discount'=>$request->discount,
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Data berhasil ditambahkan',
            'data'=>$product
        ]);
    }

    // mengupdate data
    public function update(Request $request, $id) {
        // validasi
        $validate   = Validator::make($request->all(),[
            'product_name'=>'required',
            'category_id'=>'required',
            'product_code'=>'required',
            'price'=>'required',
            'description'=>'required',
            'unit'=>'required',
            'stock'=>'required',
            'discount'=>'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak valid',
                'data'=>$validate->errors()
            ], 422);
        }

        $product    = Products::where('id', $id)->update([
            'product_name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'product_code'=>$request->product_code,
            'price'=>$request->price,
            'description'=>$request->description,
            'unit'=>$request->unit,
            'stock'=>$request->stock,
            'discount'=>$request->discount,
        ]);

        if($product) {
            $product    = Products::find($id);
            return response()->json([
                'status'=>'success',
                'message'=>'Data berhasil diubah',
                'data'=>$product
            ]);
        }
    }

    // menghapus data
    public function destroy($id) {
        $product    = Products::find($id);
        if(!$product) {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak ditemukan',
                'data'=>null
            ], 422);
        }

        $product->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Data berhasil dihapus',
            'data'=>null
        ]);
    }
}
