<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index() {
        $barang = Barang::all();
        return view('dashboard_user/dashboard',[
            'barang' => $barang,
        ]);
    }
    public function index2() {
        $barang = Barang::all();
        return view('dashboard_user/shop',[
            'barang' => $barang,
        ]);
    }
}
