<?php 
namespace App\Repositories\Front;

interface UserRepositoryInterface{

    public function login(array $request);

    public function dashboard();

    public function logout();

}