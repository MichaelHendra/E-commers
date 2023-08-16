@extends('layouts.dashboardadmin')
@section('isi')
<div class="card-body">
    <form>
        <div class="mb-3"><label for="exampleFormControlInput1">ID Barang</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name='id_barang'></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Nama Barang</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name='nama_barang'></div>
        <div class="mb-0"><label for="exampleFormControlTextarea1">Deskripsi</label><textarea class="form-control form-control-solid" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea></div>
        <div class="mb-3"><label for="exampleFormControlInput1">Gambar</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="file"></div>
        <div class="mb-3"><label for="exampleFormControlInput1">stok</label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name="stok"></div>
        </form>
</div>
@endsection