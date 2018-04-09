@extends('layouts.app')

@section('content')
<div class='main_content2'>
    <table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" valign="top">
                <div class="content_center2">
                    <div class="title2">{{ __('Log In') }}<sup></sup></div>
                    @if ($errors->has('email'))
                    <div class="loginerror">{{ $errors->first('email') }}</div>
                    @endif
                    @if ($errors->has('password'))
                    <div class="loginerror">{{ $errors->first('password') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <table width="73%" border="0" cellpadding="0" cellspacing="4">
                            <tr>
                                <td width="16%" align="left" valign="top" class="form_cell_label"><label for="username2">{{ __('Email address *') }}</label></td>
                                <td width="84%" align="left" valign="top" class="form_cell_input"><input id="email" type="email" class="form_input" name="email" value="{{ old('email') }}" required autofocus></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" class="form_cell_label"><label for="password2">Password *</label></td>
                                <td align="left" valign="top" class="form_cell_input"><input id="password" type="password" class="form_input" name="password" required></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" class="form_cell_label">&nbsp;</td>
                                <td align="left" valign="top" class="form_cell_input"><label>
                                    <input type="submit" name="button" id="button" value="Submit" />
                                </label></td>
                            </tr>
                        </table>
                    </form>
                    <br /><a href="{{ route('register') }}">{{ __('Register for a new Account') }}</a>
                    |  <a href="{{ route('password.request') }}">{{ __('Forgot your Password') }}</a>
                </div>
            </td>
        </tr>
    </table>
</div>
@endsection
