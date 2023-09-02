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
                                <th>Kode Transaksi</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $item)
                            <tr>
                                <td class="cart__product__item">
                                    <div class="cart__product__item__title">
                                        <h6>{{$item->id_transaksi}}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">Rp.  {{$item->total}}</td>
                                </td>
                                @if ($item->valid == 0)
                                <td class="cart__total">Belum Lunas</td>
                                @elseif ($item->valid == 1)
                                <td class="cart__total">Lunas</td>
                                @else
                                <td class="cart__total">Batal</td>
                                @endif
                                <td class="cart__close"><a href="/transaksi/detail/{{$item->id_transaksi}}"><span class="icon_bag_alt"></a></td>
                                <td class="cart__close"><a href="/cartdelete/{{$item->transaksi}}"><span class="icon_close"></span></a></td>
                            @empty
                                <td>empty</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection