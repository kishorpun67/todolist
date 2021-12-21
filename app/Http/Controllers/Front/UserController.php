<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Front\UserRepository;

class UserController extends Controller
{
    private $userRepository;
    
    public function  __construct(UserRepository $userRepository)
    {   
        $this->userRepository =  $userRepository;
    } 
    public function login(){
    
        if(request()->isMethod('post')) {

            return $this->userRepository->login(request()->all());
        }
        return view('front.front_login');

    } 
    
    public function dashboard()
    {
        return $this->userRepository->dashboard();
    }

    public function logout(){
        return $this->userRepository->logout();

    }
}
