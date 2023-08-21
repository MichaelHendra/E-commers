@extends('layouts.dashboardadmin')
@section('isi')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang </h6>
            <a href="/tambahbarang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white"></i>Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($barang as $item)
                        <tr>
                            <td>{{ $item->id_brg }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td><img src="{{ asset($item->path) }}" alt="Image" width="200" height="100"></td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td><a type="button" class="btn btn-warning" href="/editbarang/{{ $item->id_brg }}">Edit</a>
                                <a type="button" class="btn btn-danger btn-delete" href="/gambardelete/{{$item->id_brg}}" data-toggle="tooltip">Delete</a></td>
                        </tr>
                        @empty
                            <tr>
                                Kosong
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

@endsection