<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
use App\Models\Post;
use App\Models\RReason;
class NavbarController extends Controller
{
    public function categoriesnav($id){
        $category_data = Category::all();
        $advertisement_data = Advertisement::all();
        $adminSetting_data = AdminSetting::all();
        $reports_data = RReason::all();
        $posts_data = Post::where("category_id",$id)->latest()->paginate(6);
        return view("users.navbars.categoriesnav",[
            "category_datas" => $category_data,
            "advertisement_datas" => $advertisement_data,
            "adminSetting_datas" => $adminSetting_data,
            "posts_data" => $posts_data,
            "reports_data" => $reports_data
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
