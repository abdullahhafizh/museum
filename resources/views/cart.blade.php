@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="order-summary clearfix">
        <div class="section-title">
            <h3 class="title">Lihat Pesanan</h3>
        </div>            
        <table class="shopping-cart-table table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th></th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::content() as $row)                    
                <tr>
                    <td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
                    <td class="details">
                        <a href="#">{{ $row->name }}</a>
                        <ul>

                            <li><span{{ $row->options->has('size') ? $row->options->size : null }}</span></li>

                        </ul>
                    </td>
                    <td class="price text-center"><strong>Rp{{ $row->price }}</strong></td>
                    <td class="qty text-center">
                        <form method="POST" action="{{ route('edit') }}">
                            @csrf
                            <input class="input" type="number" name="qty" value="{{ $row->qty }}">
                            <input type="hidden" name="id" value="{{ $row->rowId }}">
                        </form>
                    </td>
                    <td class="total text-center"><strong class="primary-color">Rp{{ $row->total }}</strong></td>
                    <td class="text-right"><button class="main-btn icon-btn" onclick="event.preventDefault();document.getElementById('{{ $row->rowId }}').submit();"><i class="fa fa-close"></i></button></td>
                    <form id="{{ $row->rowId }}" method="POST" action="{{ route('remove') }}" style="display: none;">
                        @csrf                        
                        <input type="hidden" name="id" value="{{ $row->rowId }}">
                    </form>
                </tr>
                @endforeach
            </tbody>
            <tfoot>                    
                <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TOTAL</th>
                    <th colspan="2" class="total">Rp{{ Cart::total() }}</th>
                </tr>
            </tfoot>
        </table>
        <div class="pull-right">
            <button class="primary-btn">Place Order</button>
        </div>
    </div>
</div>
@endsection
