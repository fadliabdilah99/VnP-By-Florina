<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function homeadmin(){
        return view('admin.home');
    }
}
