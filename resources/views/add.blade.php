@extends('layouts.app')

@section('content')
<form id="checkout-form" class="clearfix">
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
                        <th class="text-center">Total</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(Cart::content() as $row) :?>                        
                        <tr>
                            <td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
                            <td class="details">
                                <a href="#"><?php echo $row->name; ?></a>
                                <ul>

                                    <li><span<?php echo ($row->options->has('size') ? $row->options->size : ''); ?></span></li>
                                    
                                </ul>
                            </td>
                            <td class="price text-center"><strong>Rp<?php echo $row->price; ?></strong></td>
                            <td class="qty text-center"><input class="input" type="number" value="<?php echo $row->qty; ?>"></td>
                            <td class="total text-center"><strong class="primary-color">Rp<?php echo $row->total; ?></strong></td>
                            <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>
                        </tr>

                    <?php endforeach;?>                    
                </tbody>
                <tfoot>                    
                    <tr>
                        <th class="empty" colspan="3"></th>
                        <th>TOTAL</th>
                        <th colspan="2" class="total">Rp<?php echo Cart::total(); ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="pull-right">
                <button class="primary-btn">Place Order</button>
            </div>
        </div>
    </div>
</form>
@endsection
