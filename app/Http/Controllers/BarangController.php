<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function dashboard() {
        return view('dashboard_admin/dashboard');
    }
    public function index(){
        return view('Barang.barang');
    }
    public function create() {
        return view('Barang.tambahBarang');
        
    }
}
