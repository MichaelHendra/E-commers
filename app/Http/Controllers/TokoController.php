<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)  {
        $detail = detail::where('id_brg', $request->id_brg)->where('id_user', $request->id_user)->where('status',0)->exists();
        $barang = Barang::where('id_brg', $request->id_brg)->get()->first();
        if(!Auth::user()){
            return redirect('/login');
        }else{
            if($detail){
                $harga_jual_temp = $barang->harga * $request->tambah;
                $harga_jual_db = detail::where('id_brg', $request->id_brg)->where('id_user', $request->id_user)->get()->first();
                $harga_jual_baru = $harga_jual_temp + $harga_jual_db->harga_jual;
                $jumlah_baru = $harga_jual_db->jumlah + $request->tambah;
                detail::where('id_brg', $request->id_brg)->where('id_user', $request->id_user)->update([    
                    'jumlah'=> $jumlah_baru,
                    'harga_jual'=>$harga_jual_baru,
                ]);
            }else{
                $harga_jual = $barang->harga * $request->tambah;
                detail::create([
                    'id_brg' => $request->id_brg,
                    'jumlah' => $request->tambah,
                    'harga_jual' => $harga_jual,
                    'id_user' => $request->id_user,
                    'status' => 0,
                    'tanggal' => date(now())
                ]);
            }
        }
        return redirect('/');
    }
}
