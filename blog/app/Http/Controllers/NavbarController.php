<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
class NavbarController extends Controller
{
    public function categoriesnav(){
        $category_data = Category::all();
        $advertisement_data = Advertisement::all();
        $adminSetting_data = AdminSetting::all();
        return view("users.navbars.categoriesnav",[
            "category_datas" => $category_data,
            "advertisement_datas" => $advertisement_data,
            "adminSetting_datas" => $adminSetting_data
        ]);
    }

    public function aboutnav(){
        $category_data = Category::all();
        $adminSetting_data = AdminSetting::all();
        return view("users.navbars.aboutnav",[
            "category_datas" => $category_data,
            "adminSetting_datas" => $adminSetting_data
        ]);
    }
}
