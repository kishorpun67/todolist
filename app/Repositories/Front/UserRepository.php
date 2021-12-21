<?php

namespace App\Repositories\Front;

use Session;
use App\Repositories\Front\UserRepositoryInterface;
class UserRepository implements  UserRepositoryInterface{

    public function login(array $request)
    {
        if(auth()->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('user.dashboard');
        }else{
            Session::flash('error_message', 'Invalid Email or Password');
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('front.front_dashboard');
    }

    public function logout()
    {
        auth()->logout();
        Session::flash('success_message', 'Logout successfully');
        return redirect()->route('home');
    }

}