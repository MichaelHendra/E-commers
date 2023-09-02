<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\UserM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
public function index()  {
        $detail = detail::where('id_user', Auth::user()->id_user)->where('status','0')->get();
        $subtotal = detail::where('id_user', Auth::user()->id_user)->where('status','0')->get()->sum('harga_jual');
        return view('dashboard_user.cart',['detail' => $detail,'subtotal'=>$subtotal]);
    }
public function updateQuantity(Request $request, $id)
{
    $detail = detail::find($id);
    $detail->jumlah = $request->input('quantity');
    $detail->harga_jual = $request->input('hargaj');
    $detail->save();

    return response()->json(['message' => 'Quantity updated successfully']);
}
public function delete(string $id){
    $detail = detail::find($id);
    $detail->delete();
    return redirect('/cart');
}

function generateTransactionId()
{
    $user_id = Auth::user()->id_user; // Ambil ID user yang sedang login
    $date = now()->format('Ymd');
    $cari = $user_id . $date;
    // dd($cari);
    $lastDetailTransaction = Detail::where('id_user', Auth::user()->id_user)->orderBy('id_transaksi')->first();
    $lastTransaction = Transaksi::where('id_transaksi', 'like', $cari . '%')
    ->orderByDesc('id_transaksi')->first();
    // dd($lastTransaction->id_transaksi);
    if (!$lastTransaction) {
        // dd('true');
        $increment = 1;
    } else {
        // dd($lastTransaction->id_transaksi);
        $lastDate = substr($lastTransaction->id_transaksi, strlen($user_id),8);
        //  dd($lastDate);
        if ($lastDate !== $date) {
            // dd('true');
            $increment = 1;
        } else {
            $lastIncrement = substr($lastTransaction->id_transaksi, -3);
            // dd($lastTransaction->kode_transaksi);
            $increment = intval($lastIncrement) + 1;
        }
    }
    $suffix = str_pad($increment, 3, '0', STR_PAD_LEFT);
    
    $id_transaksi = $user_id . $date . $suffix;

    return $id_transaksi;
}

public function checkout()  {
    $detail = detail::where('id_user', Auth::user()->id_user)->where('status','0')->get();
    $subtotal = detail::where('id_user', Auth::user()->id_user)->where('status','0')->get()->sum('harga_jual');
    $user = UserM::where('id_user',Auth::user()->id_user)->get()->first();
    return view('dashboard_user.checkout',['detail' => $detail,'user'=>$user,'subtotal'=>$subtotal]);
}
public function checkoutproses(Request $request){
    $user_id = Auth::user()->id_user;
    $lastTransaction = detail::where('id_user', $user_id)->where('status','0')->get();
    $subtotal = detail::where('id_user', Auth::user()->id_user)->where('status','0')->get()->sum('harga_jual');
    $id_transaksi = $this->generateTransactionId();
    Transaksi::create([
        'id_transaksi' => $id_transaksi,
        'total' => $subtotal,
        'valid' => 0, 
        'id_user' => $user_id,
    ]);
    foreach($lastTransaction as $item){
        detail::where('id_user', $user_id)->where('status','0')->update([
        'id_transaksi' => $id_transaksi,
        'status'=> 1,
    ]);
    }
    return redirect('/payment/'.$id_transaksi);
    
}
public function payment(string $id){
    $transaksi = Transaksi::find($id);
    $detail = detail::where('id_transaksi',$id)->get();
    // dd($detail);
    return view('dashboard_user.payment',['transaksi'=>$transaksi,'detail'=>$detail]);
}
public function paymentProses(Request $request, String $id) {
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('buktiBayar'), $imageName);

    DetailTransaksi::create([
        'id_transaksi' => $id,
        'bank' => $request->bank,
        'no_rek' => $request->no_rek,
        'an' => $request->an,
        'gambar' => $imageName,
        'path' => 'buktiBayar/'. $imageName,
    ]);
    return redirect('/');
}
}
