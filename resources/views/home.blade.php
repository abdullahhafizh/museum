@extends('layouts.app')

@section('content')
<div class="section-title">
    <h2 class="title">{{ $title or 'Koleksi Terbaru'}}</h2>
</div>    
@if(sizeof($products)<=0)
kosong
@endif

@foreach($products as $product)
<div class="col-md-4 col-sm-6 col-xs-6 same" id="{{ $product->id }}">
    <div class="product product-single">
        <div class="product-thumb">
            <?php
            $category = \App\Category::where('code', '=', $product->category)->value('slug');
            $subcat = \App\SubCat::where('id', '=', $product->subcat)->value('slug');
            ?>            
            <a href="{{ url($category.'/'.$subcat.'/'.$product->id) }}" class="main-btn quick-view"><i class="fa fa-search-plus fa-fw"></i>Lihat</a>
            <img src="{{url('http://192.168.100.12:8000/images/'.$product->image)}}">
        </div>        
        <div class="product-body">            
            <h3 class="product-price">Rp {{ number_format($product->price,2,',','.') }}</h3>
            <h2 class="product-name"><a href="{{ url($category.'/'.$subcat.'/'.$product->id) }}">{{ $product->name }}</a></h2>
            <div class="product-btns">
                <a href="{{ route('add') }}" class="primary-btn add-to-cart" onclick="event.preventDefault();document.getElementById('add-form{{ $product->id }}').submit();"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                <form id="add-form{{ $product->id }}" action="{{ route('add') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="category" value="{{ $product->category }}">
                    <input type="hidden" name="subcat" value="{{ $product->subcat }}">
                </form>
            </div>
        </div>
    </div>
</div>        
@endforeach

@endsection
