<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $user = (new User($this->getDb()))->getByEmail($_POST['username']);

        if( password_verify($_POST['password'], $user->password ) ){
            $_SESSION['auth'] = (int) $user->admin;
            return header('location: /projet-CDA/scrap/public/admin/scraping?success=true');
        } else {
            return header('location: /projet-CDA/scrap/public/login?error=1');
        }
    }

    public function logout()
    {
        session_destroy();
        return header('location: /projet-CDA/scrap/public/login');
    }

    public function register(){
        
    }
}
