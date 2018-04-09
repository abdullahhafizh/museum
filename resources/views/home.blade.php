@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="section-title">
        <h2 class="title">Terbaru</h2>
    </div>
</div>                

<!-- foreach($products as $product) -->
<div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
        <!-- <div class="product-thumb">
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="./img/product01.jpg" alt="">
        </div> -->
        <img src="./img/product01.jpg" alt="">
        <div class="product-body">
            <h3 class="product-price">Rp325.000</h3>            
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">            
                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
        </div>
    </div>
</div>
<!-- endforeach -->
@endsection
