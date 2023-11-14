<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchProductController extends Controller {
    public function search() {
        return view ('adminLTE.pages.search');
    }
}
