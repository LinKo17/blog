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

use Illuminate\Support\Facades\Gate;

// for daily data
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except("index");
    }

    // user section
    public function index()
    {
        $categories_data = Category::all();
        $advertisement_data = Advertisement::all();
        $adminSetting_data = AdminSetting::all();
        $reports_data = RReason::all();
        $admin_setting_data = AdminSetting::all();
        $posts_data = Post::where("post_action", "approve")->latest()->paginate(10);
        return view("users.index", [
            "categories_data" => $categories_data,
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
        $action = "admin";
        if (Gate::allows("dashborad-action", $action)) {
            $users = User::all();
            $posts = Post::where("post_action", "approve")->get();
            $categories  = Category::all();
            $advertisements = Advertisement::where("adver_image", "")->get();
            $comments       = Comment::all();
            $replies        = Reply::all();
            $ban            = User::where("ban", 1)->get();

            // Get the current date
            $currentDate = Carbon::now()->toDateString();

            // Fetch daily data for users
            $dailyUsers = User::whereDate('created_at', $currentDate)->get();

            // Fetch daily data for posts
            $dailyPosts = Post::whereDate('created_at', $currentDate)
                ->where('post_action', 'approve')
                ->get();


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
                "replies" => $replies,
                "ban"     => $ban

            ]);
        } else {
            return back();
        }
    }
}
