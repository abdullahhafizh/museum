@extends('layouts.app')

@section('content')
<form id="register-form" class="clearfix" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="col-md-7 col-md-offset-1">
        <div class="section-title">
            <h3 class="title">{{ __('Register') }}</h3>
        </div>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
        @if ($errors->has('organisasi'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('organisasi') }}</strong>
        </span>
        @endif
        @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        @if ($errors->has('gender'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
        @endif
        @if ($errors->has('tgl_lahir'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('tgl_lahir') }}</strong>
        </span>
        @endif
        @if ($errors->has('no_telp'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('no_telp') }}</strong>
        </span>
        @endif
        @if ($errors->has('no_hp'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('no_hp') }}</strong>
        </span>
        @endif
        @if ($errors->has('provinsi'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('provinsi') }}</strong>
        </span>
        @endif
        @if ($errors->has('kota'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('kota') }}</strong>
        </span>
        @endif
        @if ($errors->has('alamat'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('alamat') }}</strong>
        </span>
        @endif
        @if ($errors->has('kode_pos'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('kode_pos') }}</strong>
        </span>
        @endif
        <div class="form-group col-md-6">
            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>            
        </div>
        <div class="form-group col-md-6">
            <input id="email-confirm" type="email" class="input" name="email_confirmation" placeholder="Confirm Email Address" required>
        </div>
        <div class="form-group col-md-6">
            <input id="password" type="password" class="input" name="password" placeholder="Password" required>
        </div>        
        <div class="form-group col-md-6">
            <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <div class="form-group col-md-6">
            <input id="organisasi" type="text" class="input" name="organisasi" placeholder="Organisasi" value="{{ old('organisasi') }}">            
        </div>
        <div class="form-group col-md-6">
            <input id="name" type="text" class="input" name="name" placeholder="Full Name" value="{{ old('name') }}" required>            
        </div>
        <div class="form-group col-md-6">
            <select id="gender" class="input" name="gender" required>
                <option value="Pria" {{ old('gender') == 'Pria' ? 'selected' : null }}>Pria</option>
                <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : null }}>Wanita</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <input id="tgl_lahir" type="date" class="input" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
        </div>
        <div class="form-group col-md-6">
            <input id="no_telp" type="number" class="input" name="no_telp" value="{{ old('no_telp') }}" placeholder="Nomor Telepon">            
        </div>
        <div class="form-group col-md-6">
            <input id="no_hp" type="number" class="input" name="no_hp" value="{{ old('no_hp') }}" placeholder="Nomor Handphone">            
        </div>
        <div class="form-group col-md-6">
            <input id="provinsi" type="text" class="input" name="provinsi" value="{{ old('provinsi') }}" placeholder="Provinsi">            
        </div>
        <div class="form-group col-md-6">
            <input id="kota" type="text" class="input" name="kota" value="{{ old('kota') }}" placeholder="Kota">            
        </div>
        <div class="form-group col-md-6">
            <textarea id="alamat" class="input" name="alamat" required>{{ old('alamat') }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <input id="kode_pos" type="number" class="input" name="kode_pos" value="{{ old('kode_pos') }}" placeholder="Kode Pos" required>            
        </div>
        <div class="form-group col-md-6 col-md-offset-6">
            <div class="pull-right">                        
                <button type="submit" class="primary-btn">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </div>            
</form>
@endsection
