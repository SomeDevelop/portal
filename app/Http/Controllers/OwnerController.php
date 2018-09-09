<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(){

        return view('owner.index');

    }
    public function info(){

        return view('owner.info');

    }
    public function courses(){

        return view('owner.mycourses');

    }

}
