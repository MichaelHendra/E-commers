<?php

namespace App\Http\Controllers;

use App\Models\detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()  {
        $detail = detail::where('id_user', Auth::user()->id_user)->get();
        return view('dashboard_user.cart',['detail' => $detail]);
    }
    public function updateQuantity(Request $request, $id)
{
    $detail = detail::find($id);;
    $detail->jumlah = $request->input('quantity');
    $detail->harga_jual = $request->input('hargaj');
    $detail->save();

    return response()->json(['message' => 'Quantity updated successfully']);
}
    public function checkout()  {
        return view('dashboard_user.checkout');
    }
}
