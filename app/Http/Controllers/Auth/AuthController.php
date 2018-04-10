<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Auth;
use User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function profile()
    {
    	$data['user'] =  User::find(Auth::user()->id);
    	return view('profile')->with($data);
    }

    public function update(Request $request)
    {
    	$user = User::find(Auth::user()->id);
    	$user->name = $request->input('name');
        $user->organisasi = $request->input('organisasi');
        $user->gender = $request->input('gender');
        $user->tgl_lahir = $request->input('tgl_lahir');
        $user->no_telp = $request->input('no_telp');
        $user->no_hp = $request->input('no_hp');
        $user->provinsi = $request->input('provinsi');
        $user->kota = $request->input('kota');
        $user->alamat = $request->input('alamat');
        $user->kode_pos = $request->input('kode_pos');
    	if (!$request->input('password') == null) {    		
    		$user->password = Hash::make($request->input('password'));
    	}        
    	$user->save();        
    	return redirect(url('profile'))	;
    }
}
