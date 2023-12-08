<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    //Não será utilizada nenhuma view
    // public function view($page = 'home')
    // {
    //     // ...
    // }
}