<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShowProductController extends Controller {
    // display product
    public function readShow() {
        $products = DB::table('products')
                    ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                    ->orderBy('products.id', 'DESC')
                    ->select('products.*', 'products.id', 'product_categories.category_name')
                    ->paginate(10);
        return view ('adminLTE.pages.read', compact('products'));
    }

    // insert data
    public function addProcess(Request $request) {
        if (($request->name) && ($request->category) && ($request->code) && ($request->price) && ($request->desc) && ($request->unit) && ($request->stock) && ($request->disc) ) {
            DB::table('products')->insert([
                'product_name'  => $request->name,
                'category_id'   => $request->category,
                'product_code'  => $request->code,
                'price'         => $request->price,
                'description'   => $request->desc,
                'unit'          => $request->unit,
                'stock'         => $request->stock,
                'discount'      => $request->disc
            ]);
            // redirect with flashed
            return redirect('/master/table')->with('status', 'Data successfully add!');
        } else {
            // redirect with flashed
            return redirect('/master/create')->with('status', 'Please complete the data first!');
        }
    }

    // update/edit data
    public function update($id) {
        $products   = DB::table('products')->where('id', $id)->first();
        return view ('adminLTE.pages.edit', compact('products'));
    }

    public function updateProcess(Request $request, $id) {
        DB::table('products')->where('id', $id)->update([
            'product_name'  => $request->name,
            'category_id'   => $request->category,
            'product_code'  => $request->code,
            'price'         => $request->price,
            'description'   => $request->desc,
            'unit'          => $request->unit,
            'stock'         => $request->stock,
            'discount'      => $request->disc,
        ]);
        // redirect with flashed
        return redirect('/master/table')->with('status', 'Data updated successfully!');
    }

    // delete data
    public function delete($id) {
        DB::table('products')->where('id', $id)->delete();
        return redirect ('/master/table')->with('status', 'Data deleted successfully!');
    }
}
