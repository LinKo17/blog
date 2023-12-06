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
        // $this->middleware(['auth', 'verified'])->except('index');
        $this->middleware('auth')->except("index");
        $this->middleware('verified')->except("index");
    }

    // user section
    public function index()
    {
        if (isset(auth()->user()->id)) {
            if (!auth()->user()->email_verified_at) {
                $users = User::where("email_verified_at", null)->get();
                foreach ($users as $user) {
                    $user->delete();
                }
            }
        }

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

            // -------------------------------------------------  data section
            // Fetch daily data for users
            // $dailyUsers = User::whereDate('created_at', $currentDate)->get();

            // // Fetch daily data for posts
            // $dailyPosts = Post::whereDate('created_at', $currentDate)
            //     ->where('post_action', 'approve')
            //     ->get();


            // // Fetch daily data for comments (adjust this based on your comment model)
            // $dailyComments = Comment::whereDate('created_at', $currentDate)->get();
            // $dailyReplies = Reply::whereDate('created_at', $currentDate)->get();

            // -------------------------------------------------

            // ---------------------------------------------------- (count() section) daily
            $dailyUsers = User::whereDate('created_at', $currentDate)->count();
            $dailyPosts = Post::whereDate('created_at', $currentDate)
                ->where('post_action', 'approve')
                ->count();
            $dailyComments = Comment::whereDate('created_at', $currentDate)->count();
            $dailyReplies = Reply::whereDate('created_at', $currentDate)->count();
            // ----------------------------------------------------

            // -------------------------------------------------------- month

            $usersMonth = User::selectRaw("MONTH(created_at) as month,COUNT(*) as count")
                ->whereYear("created_at", date("Y"))
                ->groupBy("month")
                ->orderBy("month")
                ->get();

            $labels = [];
            $data = [];
            $colors = ["red", "green", "blue", "purple", "yellow", "light", "pink", "orange", "brown", "red", "green", "blue"];

            for ($i = 1; $i <= 12; $i++) {
                $month = date("F", mktime(0, 0, 0, $i, 1));
                $count = 0;

                foreach ($usersMonth as $user) {
                    if ($user->month == $i) {
                        $count = $user->count;
                        break;
                    }
                }

                array_push($labels, $month);
                array_push($data, $count);
            }

            $datasets = [
                [
                    "label" => "Users",
                    "data" => $data,
                    "backgroundColor" => $colors
                ]
            ];

            // --------------------------------------------------------

            //--------------------------------------------------------- day by day
            $usersByDay = User::selectRaw("DAYOFWEEK(created_at) as dayOfWeek, COUNT(*) as count")
                ->whereYear("created_at", date("Y"))
                ->groupBy("dayOfWeek")
                ->orderBy("dayOfWeek")
                ->get();

            $labelsBydaily = [];
            $dataBydaily = [];
            $colorsBydaily = ["#70d6ff", "#ef233c", "#ff9770", "#ffd670", "#e9ff70", "#fcbf49", "#e5e5e5"];

            // 1 corresponds to Sunday, 2 to Monday, and so on
            for ($i = 1; $i <= 7; $i++) {
                $dayOfWeek = date("D", strtotime("Sunday +{$i} days"));
                $count = 0;

                foreach ($usersByDay as $user) {
                    if ($user->dayOfWeek == $i) {
                        $count = $user->count;
                        break;
                    }
                }

                array_push($labelsBydaily, $dayOfWeek);
                array_push( $dataBydaily, $count);
            }

            $datasetsByDaily = [
                [
                    "labelsBydaily" => "Users",
                    "dataBydaily" => $dataBydaily,
                    "colorsBydaily" => $colorsBydaily
                ]
            ];

            //---------------------------------------------------------
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
                "ban"     => $ban,

                //month user
                "datasets" => $datasets,
                "labels" => $labels,

                //day by day user
                "datasetsByDaily" => $datasetsByDaily,
                "labelsBydaily" => $labelsBydaily
            ]);
        } else {
            return back();
        }
    }
}
