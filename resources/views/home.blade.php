@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="section-title">
        <h2 class="title">{{ $title or 'Terbaru'}}</h2>
    </div>
    @if(sizeof($products)<=0)
    kosong
    @endif
</div>            

@foreach($products as $product)
<div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
        <div class="product-thumb">
            <a href="{{ url($product->category.'/'.$product->subcat.'/'.$product->id) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat Lebih</a>
            <img src="{{ url('img/product01.jpg') }}" alt="">
        </div>        
        <div class="product-body">
            <h3 class="product-price">Rp{{ $product->price }}</h3>            
            <h2 class="product-name"><a href="{{ url($product->category.'/'.$product->subcat.'/'.$product->id) }}">{{ $product->name }}</a></h2>
            <div class="product-btns">            
                <a class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
