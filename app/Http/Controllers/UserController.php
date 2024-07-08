<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Alert;



class UserController extends Controller
{
    public function register(Request $request) {
        $incomingdata = $request->validate([
           'name' => ['required', 'min:3', 'max:20', Rule::unique('users','name')],
           'email' => ['required', 'email', Rule::unique('users','email')],
           'password' => ['required', 'min:8', 'max:20'],
           'password_confirmation' => ['required', 'same:password' ,'min:8'] ,
        ]);

        $incomingdata['password'] = Hash::make('password');
        unset($password_confirmation);
        $user = User::create($incomingdata);

        auth()->login($user);
        Alert::succsess('Congrats','You have Successfully Registered');


        return redirect('login');


    }
    public function login(Request $request) {
        $incomingdata = $request->validate([
           'yourname' => ['required', 'min:3', 'max:20'],
           'yourpass' => ['required', 'min:8', 'max:20'],
        ]);
        if (auth()->attempt(['name' => $incomingdata['yourname'], 'password' => $incomingdata['yourpass']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }


    public function logout() {
        auth()->logout();
        return redirect('/login');
    }




}
