<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdminSetting;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\RReason;
use App\Models\User;

// for daily data
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleController extends Controller
{


    // user section
    public function index()
    {
        $category_data = Category::all();
        $advertisement_data = Advertisement::all();
        $adminSetting_data = AdminSetting::all();
        $reports_data = RReason::all();
        $admin_setting_data = AdminSetting::all();
        $posts_data = Post::where("post_action", "approve")->latest()->paginate(6);
        return view("users.index", [
            "category_datas" => $category_data,
            "advertisement_datas" => $advertisement_data,
            "adminSetting_datas" => $adminSetting_data,
            "posts_data" => $posts_data,
            "reports_data" => $reports_data,
            "admin_setting_data" => $admin_setting_data

        ]);
    }

    //admin  section
    public function dashboard()
    {
        $users = User::all();
        $posts = Post::all();
        $categories  = Category::all();
        $advertisements = Advertisement::all();
        $comments       = Comment::all();
        $replies        = Reply::all();

        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        // Fetch daily data for users
        $dailyUsers = User::whereDate('created_at', $currentDate)->get();

        // Fetch daily data for posts
        $dailyPosts = Post::whereDate('created_at', $currentDate)->get();

        // Fetch daily data for comments (adjust this based on your comment model)
        $dailyComments = Comment::whereDate('created_at', $currentDate)->get();
        $dailyReplies = Reply::whereDate('created_at', $currentDate)->get();

        return view("admin.dashboard", [
            "users" => $users,
            "posts" => $posts,
            "categories" => $categories,
            "advertisements" => $advertisements,

            "dailyUsers" => $dailyUsers,
            "dailyPosts" => $dailyPosts,
            "dailyComments" => $dailyComments,
            "dailyReplies" => $dailyReplies,
            "comments" => $comments,
            "replies" => $replies

        ]);
    }
}
