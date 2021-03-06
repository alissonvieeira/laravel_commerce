<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin()
    {
        $data = [
            'email' => 'alisson.echo@gmail.com',
            'password' => 123456
        ];

        /*
        if(Auth::attempt($data)) {
            return "Logou";
        }


        if(Auth::check()) {
            return "Logado";
        }
        */

        return Auth::user();

        return "falhou";
    }

    public function getLogout()
    {
        Auth::logout();

        if(Auth::check()) {
            return "Logado";
        }

        return "Não está logado";
    }
}
