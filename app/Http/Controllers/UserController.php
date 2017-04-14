<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignUp()
    {
        return view('user.signUp');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|min:5|max:20',
            'name'     => 'required|min:5|max:50',
            'password' => 'required|min:6',
            'email'    => 'email|unique:users',
        ]);

        $user = new User([
            'username' => $request->input('username'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email'    => $request->input('email'),
            'address'  => $request->input('address'),
            'phone'    => $request->input('phone')
        ]);
        $user->save();
        Auth::login($user,true);

        return redirect('/');
    }

    public function getSignIn()
    {
        return view('user.signIn');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
