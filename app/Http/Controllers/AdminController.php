<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
//        $roles = Role::all();//Get all roles

        return view('admin.index');
    }
}
