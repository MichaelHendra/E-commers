<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()  {
        $transaksi = Transaksi::where('id_user', Auth::user()->id_user)->where('valid',0)->get();
        // dd($transaksi);
        return view('dashboard_user.transaksi',['transaksi'=>$transaksi]);
    }
    public function detailTransaksi(string $id) {
        $transaksi = Transaksi::find($id);
        $detail = detail::where('id_transaksi',$transaksi->id_transaksi)->get();
        return view('dashboard_user.transaksidetail',['detail'=>$detail,'transaksi'=>$transaksi]);
    }
    public function transaksiPro(string $id) {
        $transaksi = Transaksi::find($id);


    }
}
