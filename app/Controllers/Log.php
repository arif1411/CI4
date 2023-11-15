<?php
namespace App\Controllers;

use App\Models\UserModel;

class Log extends BaseController
{
    public function index()
    {
        return view('log');
    }
}
    
