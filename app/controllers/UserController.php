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

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->admin;

            return ($user->admin === "1") ? header('location: /projet-CDA/scrap/public/admin/scraping?success=true') : header('location: /projet-CDA/scrap/public/scrap?success=true');
        } else {
            return header('location: /projet-CDA/scrap/public/login?error=1');
        }
    }

    public function logout()
    {
        session_destroy();
        return header('location: /projet-CDA/scrap/public/login');
    }

    public function register()
    {
        $this->view('auth.register');
    }

    public function registerPost()
    {
        $user = new User($this->getDb());


        if ($_POST['password'] !== $_POST['passwordConfirm']) return header('location: /projet-CDA/scrap/public/register?error=1');

        $encoded = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $data = [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'password' => $encoded,
            'admin' => '0'
        ];

        $res = $user->create($data);

        if ($res === true) {
            return header('location: /projet-CDA/scrap/public/register?success=true');
        }
    }
}
