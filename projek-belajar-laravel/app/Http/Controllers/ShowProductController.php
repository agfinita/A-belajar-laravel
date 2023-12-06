<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ShowProductController extends Controller {
    // create product
    public function create() {
        return view ('adminLTE.pages.create');
    }

    // display product
    public function show() {
        $products = DB::table('products')
                    ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                    ->orderBy('products.id', 'DESC')
                    ->select('products.*', 'products.id', 'product_categories.category_name')
                    ->paginate(10);
        return view ('adminLTE.pages.read', compact('products'));
    }

    // insert data
    public function insert(Request $request) {
        $validatedData  = $request->validate([
            'name'      => 'required',
            'category'  => 'required|not_in:0',
            'code'      => 'required|unique:products,product_code',
            'price'     => 'required|numeric',
            'desc'      => 'nullable',
            'unit'      => 'required',
            'stock'     => 'required|numeric',
            'disc'      => 'required|numeric',
        ]);

        // data berhasil divalidasi
        DB::table('products')->insert([
                'product_name'  => $validatedData['name'],
                'category_id'   => $validatedData['category'],
                'product_code'  => $validatedData['code'],
                'price'         => $validatedData['price'],
                'description'   => $validatedData['desc'],
                'unit'          => $validatedData['unit'],
                'stock'         => $validatedData['stock'],
                'discount'      => $validatedData['disc'],
        ]);

        // redirect with flashed
        return redirect('/product')->with('status', 'Data successfully add!');
    }

    // update/edit data
    public function update($id) {
        $products   = DB::table('products')->where('id', $id)->first();
        return view ('adminLTE.pages.edit', compact('products'));
    }

    public function updateProcess(Request $request, $id) {
        $products   = DB::table('products')->where('id', $id)->first();

        $validatedData  = $request->validate([
            'name'      => 'required',
            'category'  => 'required|not_in:0',
            'code'      =>  [
                                'required',
                                Rule::unique('products', 'product_code')->ignore($id)->where(function () use ($request, $products) {
                                    return $request->code != $products->product_code;
                                }),
                            ],
            'price'     => 'required|numeric',
            'desc'      => 'nullable',
            'unit'      => 'required',
            'stock'     => 'required|numeric',
            'disc'      => 'required|numeric',
        ]);

        // data berhasil divalidasi
        DB::table('products')->where('id', $id)->update([
            'product_name'  => $validatedData['name'],
            'category_id'   => $validatedData['category'],
            'product_code'  => $validatedData['code'],
            'price'         => $validatedData['price'],
            'description'   => $validatedData['desc'],
            'unit'          => $validatedData['unit'],
            'stock'         => $validatedData['stock'],
            'discount'      => $validatedData['disc'],
        ]);
        // redirect with flashed
        return redirect('/product')->with('status', 'Data updated successfully!');
    }

    // delete data
    public function delete($id) {
        DB::table('products')->where('id', $id)->delete();
        return redirect ('/product')->with('status', 'Data deleted successfully!');
    }
}
