<?php

namespace App\Http\Controllers;

use App\Models\UserM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {
        return view('register');
    }
    public function proses(Request $request) {
            UserM::create([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'alamat'=> $request->alamat,
        ]);
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/login'); 
    }
    // public function index2() {
    //     if (Auth::check()) {
    //         return redirect('/');
    //     }else{
    //         return view('login');
    //     }
    // }
    // public function loginAction(Request $request){
    //     $data =[
    //         'username' => $request->input('username'),
    //         'password' => $request->input('password'),
    //     ];

    //     if (Auth::Attempt($data)){
    //         return redirect('/');
    //     }else{
    //         Session::flash('error','Username atau Password Salah');
    //         return redirect('/');
    //     }
    // }
    // public function Logout() {
    //     Auth::logout();
    //     return redirect('/');
    // }
}
