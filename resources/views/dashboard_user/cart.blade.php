@extends('layouts.utama')
@section('isi')
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($detail as $item)
                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{ asset($item->barang->path) }}" alt="" width="90px" height="90px">
                                    <div class="cart__product__item__title">
                                        <h6>{{$item->barang->nama_barang}}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">Rp.  {{$item->barang->harga}}</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty" data-detail-id="{{ $item->id_detail }}" data-product-id="{{ $item->id_brg }}" data-harga="{{ $item->barang->harga}}">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <input type="text" value="{{$item->jumlah}}" min="0">
                                        {{-- <span class="dec qtybtn">-</span>
                                        <span class="inc qtybtn">+</span> --}}
                                    </div>
                                </td>
                                <td class="cart__total" data-detail-id="{{ $item->id_detail }}">Rp.  {{$item->harga_jual}}</td>
                                <td class="cart__close"><a href="/cartdelete/{{$item->id_detail}}"><span class="icon_close"></span></a></td>
                            @empty
                                <td>empty</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="#">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span> Update cart</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Total <span>Rp. {{$subtotal}}</span></li>
                    </ul>
                    <a href="/checkout" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection