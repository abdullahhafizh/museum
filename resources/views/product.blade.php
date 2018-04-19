@extends('layouts.app')

@section('content')
<div class="product product-details clearfix">
    <div class="col-md-6 col-md-offset-1">
        <div id="product-main-view">
            <div class="product-view">
                <img src="{{url('http://192.168.100.12:8000/images/'.$product->image)}}">
            </div>
        </div>        
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="product-body">            
            <h2 class="product-name">{{ $product->name }}</h2>
            <h3 class="product-price" id="pricetext">Rp {{ number_format($product->price,2,',','.') }}</h3>            
            <p><strong>Availability:</strong> {{ $product->stock <=0 ? 'Out of Stock' : 'In Stock' }}</p>
            <p><strong>Brand:</strong> {{ $product->company }}</p>
            <p style="word-break: all;">{{ $product->description }}</p>
            <?php
            $sizes = Size::where('product', '=', $product->id)->get();
            ?>
            <div class="product-options">
                @if(sizeof($sizes)<=0)
                @else
                <ul class="size-option">
                    <li><span class="text-uppercase">Size:</span></li>
                    @foreach($sizes as $size)
                    <li id="{{ $size->id }}"><a>{{ $size->size }}</a></li>
                    @endforeach
                </ul>                
                @endif
                <form method="POST" action="{{ route('add') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">                    
                    <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="category" value="{{ $product->category }}">
                    <input type="hidden" name="subcat" value="{{ $product->subcat }}">
                    <input type="hidden" id="size" name="size" value="{{ $product->size }}">
                    <div class="product-btns">
                        <div class="qty-input">
                            <span class="text-uppercase">{{ $product->type }}: </span>
                            <input class="input" type="number" min="1" max="{{ $product->stock }}" name="qty" value="{{ old('qty') or 1 }}">
                        </div>
                        <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart fa-fw"></i>&nbsp;Tambah ke Keranjang</button>                
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript">
    <?php foreach ($sizes as $size): ?>
    $('#{{ $size->id }}').click(function(){
        $('#price').val('{{ $size->price }}');
        $('#size').val('{{ $size->size }}');
        $('#pricetext').text('Rp{{ $size->price }}');
    });    
    <?php endforeach ?>    
</script>
@endsection
