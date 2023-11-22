<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
class RoleController extends Controller
{
    // user section
    public function index(){
        $category_data = Category::all();
        $advertisement_data = Advertisement::all();
        $adminSetting_data = AdminSetting::all();
        return view("users.index",[
            "category_datas" => $category_data,
            "advertisement_datas" => $advertisement_data,
            "adminSetting_datas" => $adminSetting_data
        ]);
    }

    //admin  section
    public function dashboard(){
        return view("admin.dashboard");
    }
}
