<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoriesController extends Controller
{
    //
    public function index() {
        $categories = DB::table('product_categories')->get();

        dd($categories);
    }
}
