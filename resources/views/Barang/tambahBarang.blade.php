@extends('layouts.dashboardadmin')
@section('isi')
<div class="card-body">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <br/>
    <form action="{{ url('/uploadgambar')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label for="exampleFormControlInput1">ID Barang</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name='id_barang'></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Nama Barang</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name='nama_barang'></div>
        <div class="mb-0"><label for="exampleFormControlTextarea1">Deskripsi</label><textarea class="form-control form-control-solid" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Gambar</label><input class="form-control form-control-solid" id="exampleFormControlInput1" name="gambar" type="file"></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Harga</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name="harga"></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Stok</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name="stok"></div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
</div>
@endsection