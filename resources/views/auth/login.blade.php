@extends('layouts.app')

@section('content')
<form id="login-form" class="clearfix" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="col-md-6 col-md-offset-3">        
        <div class="section-title">
            <h3 class="title">{{ __('Login') }}</h3>
        </div>
        <div class="form-group col-md-10 col-md-offset-1">
            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
        </div>
        <div class="form-group col-md-10 col-md-offset-1">
            <input id="password" type="password" class="input" name="password" placeholder="Password" required>
        </div>
        <div class="form-group col-md-10 col-md-offset-1">
            @if ($errors->has('email'))
            <div class="pull-left">
                <div class="loginerror">{{ $errors->first('email') }}</div>
            </div>
            @endif
            @if ($errors->has('password'))
            <div class="pull-right">
                <div class="loginerror">{{ $errors->first('password') }}</div>
            </div>
            @endif            
            <div class="pull-right">
                <button class="primary-btn">Login</button>
            </div>            
        </div>
    </div>            
</form>
@endsection
