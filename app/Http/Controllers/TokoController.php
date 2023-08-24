<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

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
    public function detail(String $id)  {
        $barang = Barang::find($id);
        return view('/dashboard_user/detail', [
            'barang' => $barang,
        ]);
    }
    public function detailAdd(Request $request, String $id)  {
        $barang = Barang::find($id);
        $detail = Barang::all();
    }
}
