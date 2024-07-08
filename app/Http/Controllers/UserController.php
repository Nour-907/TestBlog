<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;


class UserController extends Controller
{
    public function register(Request $request) {
        $incomingdata = $request->validate([
           'name' => ['required', 'min:3', 'max:20', Rule::unique('users','name')],
           'email' => ['required', 'email', Rule::unique('users','email')],
           'password' => ['required', 'min:8', 'max:20'],
           'password_confirmation' => ['required', 'same:password' ,'min:8'] ,
        ]);
//bcrypt($incomingdata['password']);
        $incomingdata['password'] = Hash::make('password');
        unset($password_confirmation);
        $user = User::create($incomingdata);
        auth()->login($user);
        Alert::success('Congrats','You have Successfully Registered');


        return redirect('login');


    }
    public function login(Request $request) {
        $incomingdata = $request->validate([
           'login_name' => ['required'],
           'login_password' => ['required'],
        ]);
        //dd($incomingdata);
        if (auth()->attempt(['name' =>$incomingdata ['login_name'], 'password' =>$incomingdata ['login_password']])) {

           $request->session()->regenerate( );
           return redirect('/');


        }
        else{
            Alert::error('Sorry','Your data is invalid');

            return redirect('login');




    }

    }

    public function logout(Request $request)
    {
        $auth->guard()->logout();

        $request->session()->invalidate();

        return $auth->loggedOut($request) ?: redirect('/login');
    }













}
