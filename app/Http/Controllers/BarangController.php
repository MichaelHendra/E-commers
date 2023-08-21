<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class BarangController extends Controller
{
    public function dashboard() {
        return view('dashboard_admin/dashboard');
    }
    public function index(){
        $barang = Barang::all();
        return view('Barang.barang', [
             'barang' => $barang,
        ]);
    }
    public function create() {
        return view('Barang.tambahBarang');
    }
    public function store(Request $request) {
        // dd($request->id_barang);
        $this->validate($request,[
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required',
            'stok' => 'required'
        ]);
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('imgBarang'), $imageName);

        Barang::create([
            'id_brg' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'path' => 'imgBarang/' . $imageName,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        
        return redirect('/barang');
    }
    public function edit(String $id) {
        $barang = Barang::find($id);
        return view('Barang.editBarang',[
            'barang' => $barang,
        ]);
        
    }
    public function editStore(Request $request, String $id)  {
       $barang = Barang::find($id);
       if($request->hasFile('gambar')){
           Storage::delete($barang->path);
           $image = $request->file('gambar');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('imgBarang'), $imageName);

           $barang->update([
            'id_brg' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'path' => 'imgBarang/' . $imageName,
            'harga' => $request->harga,
            'stok' => $request->stok
           ]);
       }else{
        $barang->update([
            'id_brg' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok
           ]);
       }
       return redirect('/barang');
       
    }
    public function delete(String $id) {
        $barang = Barang::findOrFail($id);
        $ngaw = File::delete($barang->path);
        $barang->delete();
        return redirect('/barang');
    }
}
