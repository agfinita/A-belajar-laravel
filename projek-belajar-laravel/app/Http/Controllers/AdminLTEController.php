<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLTEController extends Controller {
    public function index() {
        $countProduct       = DB::table('products')->count();
        $totalCategories    = DB::table('product_categories')->count();
        $totalPrice         = DB::table('products')->sum('price');
        $totalStock         = DB::table('products')->sum('stock');

        // start-highchart
        // jumlah produk per kategori
        $productPerCategory = DB::table('products')
                            -> select('category_id', DB::raw('COUNT(*) as jml_produk'))
                            -> groupBy('category_id')
                            -> get();
        $category1          = $productPerCategory[0]->jml_produk;
        $category2          = $productPerCategory[1]->jml_produk;
        $category3          = $productPerCategory[2]->jml_produk;
        $category4          = $productPerCategory[3]->jml_produk;

        // total harga produk per kategori
        $totalPerCategory   = DB::table('products')
                            -> select('category_id', DB::raw('SUM(price) as total_harga'), DB::raw('MONTH(created_at) as month'))
                            -> groupBy('category_id', 'month')
                            -> get();
        $total1Nov          = $totalPerCategory[0]->total_harga;
        $total2Nov          = $totalPerCategory[3]->total_harga;
        $total3Nov          = $totalPerCategory[1]->total_harga;
        $total4Nov          = $totalPerCategory[2]->total_harga;
        $total1Des          = $totalPerCategory[6]->total_harga;
        $total2Des          = $totalPerCategory[4]->total_harga;
        $total4Des          = $totalPerCategory[5]->total_harga;

        // jumlah stok produk per kategori
        $stockPerCategory   = DB::table('products')
                            ->select('category_id', DB::raw('SUM(stock) as jml_stok'))
                            ->groupBy('category_id')
                            ->get();
        $stock1             = $stockPerCategory[0]->jml_stok;
        $stock2             = $stockPerCategory[1]->jml_stok;
        $stock3             = $stockPerCategory[3]->jml_stok;
        $stock4             = $stockPerCategory[3]->jml_stok;
        // end-highchart

        return view ('adminLTE.pages.master', [ 'countProduct'          => $countProduct,
                                                'totalCategories'       => $totalCategories ,
                                                'totalPrice'            => 'Rp. ' . $totalPrice,
                                                'totalStock'            => $totalStock,
                                                'productPerCategory'    => $productPerCategory,
                                                'category1'             => $category1,
                                                'category2'             => $category2,
                                                'category3'             => $category3,
                                                'category4'             => $category4,
                                                'totalPerCategory'      => $totalPerCategory,
                                                'total1Nov'             => $total1Nov,
                                                'total2Nov'             => $total2Nov,
                                                'total3Nov'             => $total3Nov,
                                                'total4Nov'             => $total4Nov,
                                                'total1Des'             => $total1Des,
                                                'total2Des'             => $total2Des,
                                                'total4Des'             => $total4Des,
                                                'stockPerCategory'      => $stockPerCategory,
                                                'stock1'                => $stock1,
                                                'stock2'                => $stock2,
                                                'stock3'                => $stock3,
                                                'stock4'                => $stock4
                                            ]);
    }
}
