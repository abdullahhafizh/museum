@extends('layouts.app')

@section('content')
<!--  Product Details -->
<div class="product product-details clearfix">
    <div class="col-md-6">
        <div id="product-main-view">
            <div class="product-view">
                <img src="./img/main-product01.jpg" alt="">
            </div>
        </div>        
    </div>
    <div class="col-md-6">
        <div class="product-body">            
            <h2 class="product-name">Product Name Goes Here</h2>
            <h3 class="product-price">Rp325.000</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>            

            <div class="product-btns">
                <div class="qty-input">
                    <span class="text-uppercase">QTY: </span>
                    <input class="input" type="number">
                </div>
                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>                
            </div>
        </div>
    </div>
</div>
<!-- /Product Details -->
@endsection
