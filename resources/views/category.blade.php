@extends('layouts.app')

@section('content')
<form id="register-form" class="clearfix" method="POST" action="{{ route('addcategory') }}">
    @csrf
    <div class="col-md-8 col-md-offset-2">        
        <div class="form-group col-md-6">
            <input type="number" class="input" name="code" required autofocus>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="input" name="name" required autofocus>
        </div>        
        <div class="form-group col-md-6 col-md-offset-6">
            <div class="pull-right">                        
                <button type="submit" class="primary-btn">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
    </div>            
</form>
@endsection
