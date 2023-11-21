<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function categoriesnav(){
        return view("users.navbars.categoriesnav");
    }

    public function aboutnav(){
        return view("users.navbars.aboutnav");
    }
}
