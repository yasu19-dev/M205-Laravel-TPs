<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthTestController extends Controller
{
    public function index()
    {
        return view('auth-test.index');
    }

}
