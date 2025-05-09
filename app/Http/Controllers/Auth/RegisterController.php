<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        
        'phone' => ['required', 'regex:/^[67]\d{7}$/'],
        'address' => ['required', 'string', 'max:255'],
        'dui' => ['required', 'regex:/^\d{8}-\d{1}$/'],
    ], [/*Verifica si una entrada de usuario cumple con el formato especifico como telefono*/
        'phone.regex' => 'El número de teléfono debe tener 8 dígitos y comenzar con 6 o 7.',
        'dui.regex' => 'El DUI debe tener el formato 12345678-9.',
    ]);
}



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    

     protected function create(array $data)
     {
         $photoPath = null;
     
         if (request()->hasFile('photo')) {
             $photoPath = request()->file('photo')->store('profile_photos', 'public');
         }
     
         return User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']),
             'phone' => $data['phone'] ?? null,
             'address' => $data['address'] ?? null,
             'dui' => $data['dui'] ?? null,
             'photo' => $photoPath,
         ]);
     }
     
    }
