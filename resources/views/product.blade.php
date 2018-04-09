@extends('layouts.app')

@section('content')
<div class="product product-details clearfix">
    <div class="col-md-6">
        <div id="product-main-view">
            <div class="product-view">
                <img src="{{url('img/main-product01.jpg')}}" alt="">
            </div>
        </div>        
    </div>
    <div class="col-md-6">
        <div class="product-body">            
            <h2 class="product-name">{{ $product->name }}</h2>
            <h3 class="product-price">Rp{{ $product->price }}</h3>            
            <p><strong>Availability:</strong> {{ $product->stock <=0 ? 'Out of Stock' : 'In Stock' }}</p>
            <p><strong>Brand:</strong> {{ $product->company }}</p>
            <p>{{ $product->description }}</p>            

            <form>
                <div class="product-btns">
                    <div class="qty-input">
                        <span class="text-uppercase">QTY: </span>
                        <input class="input" type="number" min="1" max="{{ $product->stock }}" name="qty" value="{{ old('qty') or 1 }}">
                    </div>
                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart fa-fw"></i>&nbsp;Tambah ke Keranjang</button>                
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
