<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function categoryside(){
        return view("admin.siders.category");
    }

    public function userside(){
        return view("admin.siders.user");
    }

    public function createside(){
        return view("admin.siders.create");
    }

    public function showside(){
        return view("admin.siders.show");
    }

    public function commentside(){
        return view("admin.siders.comments");
    }

    public function approveside(){
        return view("admin.siders.approve");
    }

    public function reportside(){
        return view("admin.siders.report");
    }

    public function advertiside(){
        return view("admin.siders.adverti");
    }

    public function annouside(){
        return view("admin.siders.annou");
    }

    public function settingside(){
        return view("admin.siders.setting");
    }
}
