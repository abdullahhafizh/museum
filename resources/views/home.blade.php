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
                <a href="{{ route('add') }}" class="primary-btn add-to-cart" onclick="event.preventDefault();document.getElementById('add-form{{ $product->id }}').submit();"><i class="fa fa-shopping-cart"></i> Add to Cart</a>                
                <form id="add-form{{ $product->id }}" action="{{ route('add') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="price" value="{{ $product->category }}">
                    <input type="hidden" name="price" value="{{ $product->subcat }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
