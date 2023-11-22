<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
use App\Models\User;

class SiderController extends Controller
{
    public function categoryside(){
        $data = Category::all();
        return view("admin.siders.category",[
            "categories" => $data
        ]);
    }

    public function userside(){
        $usersData = User::latest()->paginate(10);
        return view("admin.siders.user",[
            "usersData" => $usersData
        ]);
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
        $adver_data = Advertisement::all();
        return view("admin.siders.adverti",[
            "adver_data" => $adver_data
        ]);
    }

    public function annouside(){
        return view("admin.siders.annou");
    }

    public function settingside(){
        $admin_setting = AdminSetting::find(1);
        return view("admin.siders.setting",[
            "admin_setting" => $admin_setting
        ]);
    }

}
