<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
use App\Models\User;
use App\Models\Post;
use App\Models\RReason;
use App\Models\MessagesToAdmin;

class SiderController extends Controller
{
    public function __construct(){
        // $this->middleware(["auth","verified"]);
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function categoryside(){
        $data = Category::all();
        return view("admin.siders.category",[
            "categories" => $data
        ]);
    }

    public function userside(){
        $usersData = User::latest()->paginate(10);
        $postData  = Post::all();
        return view("admin.siders.user",[
            "usersData" => $usersData,
            "postData" => $postData
        ]);
    }


    public function commentside(){
        return view("admin.siders.comments");
    }

    public function approveside(){
        $approve_request = Post::where("post_action","waiting")->latest()->paginate(6);
        $reasons = RReason::all();
        return view("admin.siders.approve",[
            "approve_requests" => $approve_request,
            "reasons" => $reasons
        ]);
    }

    public function reportside(){
        $post_data = Post::where("report","report")->latest()->paginate(6);
        return view("admin.siders.report",[
            "posts_data" => $post_data
        ]);
    }

    public function advertiside(){
        $adver_data = Advertisement::all();
        return view("admin.siders.adverti",[
            "adver_data" => $adver_data
        ]);
    }

    public function annouside(){
        $annou_data = AdminSetting::all();
        return view("admin.siders.annou",[
            "annou_data" => $annou_data
        ]);
    }

    public function settingside(){
        $admin_setting = AdminSetting::find(1);
        return view("admin.siders.setting",[
            "admin_setting" => $admin_setting
        ]);
    }

    public function messagesider(){
        $message = MessagesToAdmin::latest()->paginate(10);
        return view("admin.siders.message",[
            "messages" =>$message
        ]);
    }

    public function emailsider(){
        return view("admin.siders.email");
    }

}
