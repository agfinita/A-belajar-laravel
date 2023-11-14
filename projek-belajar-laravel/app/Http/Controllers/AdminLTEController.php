<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLTEController extends Controller {
    public function tampil() {
        return view ('adminLTE.pages.master');
    }
}
