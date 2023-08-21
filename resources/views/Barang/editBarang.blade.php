@extends('layouts.dashboardadmin')
@section('isi')
<div class="card-body">
    <form action="{{url('/editproses/'.$barang->id_brg)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="exampleFormControlInput1">ID Barang</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name='id_barang' value="{{$barang->id_brg}}" readonly></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Nama Barang</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name='nama_barang' value="{{$barang->nama_barang}}"></div>
        <div class="mb-0"><label for="exampleFormControlTextarea1">Deskripsi</label><textarea class="form-control form-control-solid" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{ $barang-> deskripsi}}</textarea></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Gambar</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="file" name="gambar"></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Harga</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name="harga" value="{{ $barang->harga }}" ></div>
        <div class="mb-3"><label for="exampleFormControlInput1">stok</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name="stok" value="{{ $barang->stok }}"></div>
        <button name="simpan" type="submit" id="btn-submit"class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection