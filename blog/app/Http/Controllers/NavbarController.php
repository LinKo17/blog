<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
use App\Models\Post;
use App\Models\RReason;
use App\Models\User;

use Illuminate\Support\Facades\Gate;

class NavbarController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified'])->except("categoriesnav", "aboutnav", "usernav", "profile");
        $this->middleware('auth')->except("categoriesnav", "aboutnav", "usernav", "profile");
        $this->middleware('verified')->except("categoriesnav", "aboutnav", "usernav", "profile");
    }

    public function categoriesnav($id)
    {
        if(isset(auth()->user()->id)){
            if(!auth()->user()->email_verified_at){
                return back();
            }
        }
        $categories_data = Category::all();
        $advertisement_data = Advertisement::all();
        $adminSetting_data = AdminSetting::all();
        $reports_data = RReason::all();
        $posts_data = Post::where("category_id", $id)->latest()->paginate(6);
        return view("users.navbars.categoriesnav", [
            "categories_data" => $categories_data,
            "advertisement_datas" => $advertisement_data,
            "adminSetting_datas" => $adminSetting_data,
            "posts_data" => $posts_data,
            "reports_data" => $reports_data
        ]);
    }

    public function aboutnav()
    {
        if(isset(auth()->user()->id)){
            if(!auth()->user()->email_verified_at){
                return back();
            }
        }

        $categories_data = Category::all();
        $adminSetting_data = AdminSetting::all();
        return view("users.navbars.aboutnav", [
            "categories_data" => $categories_data,
            "adminSetting_datas" => $adminSetting_data
        ]);
    }

    public function usernav()
    {
        if(isset(auth()->user()->id)){
            if(!auth()->user()->email_verified_at){
                return back();
            }
        }

        $ban = 0;
        if (Gate::allows("check-ban", $ban)) {
            $validator = validator(request()->all(), [
                "search" => "required"
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $request_data = request()->search;
            $users = User::where("name", "like", "%$request_data%")->latest()->paginate(10);
            return view("users.navbars.usernav", [
                "users" => $users
            ]);
        } else {
            return back();
        }
    }

    public function profile($id)
    {
        if(isset(auth()->user()->id)){
            if(!auth()->user()->email_verified_at){
                return back();
            }
        }

        $user_data = User::find($id);
        $categories_data = Category::all();
        $post_data = Post::where("user_id", $id)->get()->reverse();
        return view("users.parts.profile", [
            "categories_data" => $categories_data,
            "user_data" => $user_data,
            "posts_data" => $post_data
        ]);
    }
}
