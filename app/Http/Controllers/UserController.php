<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Admin routes
    public function users()
    {
        $users = User::where('id','<>',auth()->user()->id)->orderBy('username','ASC')->get();

        return view('admin.users',['users' => $users]);
    }

    public function addUser(Request $request)
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
        $user->roles()->attach(2);

        return back()->with('success','User has been successfully added');
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $userName = $user->username;
        $user->delete();

        return back()->with('success','User '.$userName.' has been successfully deleted');
    }

    public function promoteToAdmin($userId)
    {
        $user = User::find($userId);

        $user->roles()->sync(1);

        return back()->with('success','User '.$user->username.' has been successfully promoted to admin');
    }

    public function backToRegular($userId)
    {
        $user = User::find($userId);

        $user->roles()->sync(2);

        return back()->with('success','User '.$user->username.' has been successfully returned to regular user');
    }

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
        $user->roles()->attach(2);
        Auth::login($user,true);

        return redirect()->intended();
    }

    public function getSignIn()
    {
        return view('user.signIn');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember_me = ($request->input('remember_me') === 'on') ? true : false;

        if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')],$remember_me)){
            return redirect()->intended();
        }
        return back()->with('error','Username or password incorrect');
    }

    public function getProfile()
    {
        return view('user.profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('getIndex');
    }
}
