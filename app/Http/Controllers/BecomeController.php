<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BecomeController extends Controller
{
    public function index(){

        return view('become_teacher.become');

    }
}
