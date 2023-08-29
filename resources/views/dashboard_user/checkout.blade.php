@extends('layouts.utama')
@section('isi')
<section class="checkout spad">
    <div class="container">
        <form action="/checkout/proses" method="POST" class="checkout__form">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Nama </p>
                                <input type="text" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="checkout__form__input">
                                <p>Alamat</p>
                                <input type="text" value="{{ $user->alamat }}" disabled>
                            </div>
                            <div class="checkout__form__input">
                                <p>Kota</p>
                                <input type="text" value="{{ $user->kota }}" disabled>
                            </div>
                            <div class="checkout__form__input">
                                <p>Provinsi</p>
                                <input type="text" value="{{ $user->prov }}" disabled>
                            </div>
                            <div class="checkout__form__input">
                                <p>Kode Pos </p>
                                <input type="text" value="{{ $user->kode_pos }}" disabled>
                            </div>
                            <div class="checkout__form__input">
                                <p>No Telp </p>
                                <input type="text" value="{{ $user->no_telp }}" disabled>
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
                                    <li>Total <span>Rp. {{$subtotal}}</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="paypal">
                                    PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                                @csrf
                                {{-- <input type="hidden" name="id_transaksi" value="{{ $id_transaksi }}"> --}}
                                <input type="hidden" name="total" value="{{$subtotal}}">
                                <button type="submit" class="site-btn">Lanjut</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection