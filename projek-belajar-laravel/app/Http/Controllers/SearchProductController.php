<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchProductController extends Controller {
    public function search(Request $request) {
        $keyword    = $request->input('keyword');

        $products   = DB::table('products')
                    ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                    ->where('products.product_name', 'like', '%'. $keyword . '%')
                    ->orWhere('product_categories.category_name', 'like', '%' . $keyword . '%')
                    ->orWhere('products.description', 'like', '%' . $keyword . '%')
                    ->orderBy('products.id', 'ASC')
                    ->select('products.*', 'products.id', 'product_categories.category_name')
                    ->paginate(10);

        return view ('adminLTE.pages.read', compact('products', 'keyword'));
    }
}
