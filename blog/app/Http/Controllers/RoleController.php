<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // user section
    public function index(){
        return view("users.index");
    }

    //admin  section
    public function dashboard(){
        return view("admin.dashboard");
    }
}
