<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users|confirmed',
            'password' => 'required|string|min:6|confirmed',                        
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'tgl_lahir' => 'required',            
            'alamat' => 'required|string|max:255',
            'kode_pos' => 'required|max:255',            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'organisasi' => $data['organisasi'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'tgl_lahir' => $data['tgl_lahir'],
            'no_telp' => $data['no_telp'],
            'no_hp' => $data['no_hp'],
            'provinsi' => $data['provinsi'],
            'kota' => $data['kota'],
            'alamat' => $data['alamat'],
            'kode_pos' => $data['kode_pos'],            
        ]);
    }
}
