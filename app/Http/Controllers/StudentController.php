<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function display($id, $name, $pass){
        return view('student', compact('id','name','pass'));
    }
}
