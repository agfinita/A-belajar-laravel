<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLTEController extends Controller {
    public function index() {
        $countProduct   = DB::table('products')->count();
        $countVendor    = DB::table('vendors')->count();
        $userCount      = DB::table('users')->count();
        return view ('adminLTE.pages.master', ['countProduct' => $countProduct, 'countVendor' => $countVendor, 'userCount' => $userCount]);
    }
}
