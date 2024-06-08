<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // menampilkan dashboard admin
    public function dashboardAdmin() {
        return view('admin.index');
    }
}
