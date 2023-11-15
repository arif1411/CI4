<?php

namespace App\Controllers;

class test extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
