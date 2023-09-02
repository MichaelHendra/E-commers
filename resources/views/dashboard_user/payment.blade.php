@extends('layouts.utama')
@section('isi')
<section class="checkout spad">
    <div class="container">
        <form action="{{url('/payment/proses/'.$transaksi->id_transaksi)}}" method="POST" enctype="multipart/form-data" class="checkout__form">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Kode Transaksi</p>
                                <input type="text" name="id_transaksi" value="{{ $transaksi->id_transaksi }}" disabled>
                            </div>
                            <div class="checkout__form__input">
                                <p>Bank</p>
                                <input type="text" name="bank" >
                            </div>
                            <div class="checkout__form__input">
                                <p>No rekening</p>
                                <input type="text" name="no_rek">
                            </div>
                            <div class="checkout__form__input">
                                <p>Atas Nama</p>
                                <input type="text" name="an">
                            </div>
                            <div class="checkout__form__input">
                                <p>Bukti Bayar</p>
                                <input type="file" name="image">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @forelse ($detail as $item)
                                    <li>{{$item->barang->nama_barang}}<span>Rp. {{$item->harga_jual}}</span></li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Total <span>Rp. {{$transaksi->total}}</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="paypal">
                                    PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                                <button type="submit" class="site-btn">Lanjut</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection