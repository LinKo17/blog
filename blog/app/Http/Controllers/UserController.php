<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($id){
        return view("users.parts.profile");
    }

    public function setting($id){
        return view("users.parts.setting");
    }

    public function createPost(){
        return view("users.parts.createPost");
    }

    public function editPost($id){
        return view("users.parts.editPost");
    }
}
