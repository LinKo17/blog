<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Hide;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
use PhpParser\Node\Expr\AssignOp\Pow;

class UserController extends Controller
{
    //profile section
    public function profile()
    {

        $user_data = User::find(auth()->user()->id);
        $category_data = Category::all();
        $post_data = Post::where("user_id", auth()->user()->id)->get()->reverse();
        return view("users.parts.profile", [
            "category_datas" => $category_data,
            "user_data" => $user_data,
            "posts_data" => $post_data
        ]);
    }

    public function setting()
    {
        $user_setting_data = User::find(request()->user()->id);
        $users_hide_data = Hide::where("user_id",request()->user()->id)->latest()->get();
        return view("users.parts.setting", [
            "user_setting_data" => $user_setting_data,
            "users_hide_data"    => $users_hide_data
        ]);
    }

    public function createPost()
    {
        $category_data = Category::all();
        return view("users.parts.createPost", [
            "category_datas" => $category_data
        ]);
    }

    public function editPostForm($id)
    {

        $category_data = Category::all();
        $post_data     = Post::find($id);
        return view("users.parts.editPost", [
            "categories_data" => $category_data,
            "post_data" => $post_data
        ]);
    }

    public function addPost()
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "images.*" => ["image", "mimes:jpg,png,jpeg,svg,gif"],

            "category_id" => "required",
            "description" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //    return "fine";
        $post = new Post();
        $post->title = request()->title;

        if (request()->images) {
            $images = [];
            foreach (request()->images as $image) {
                $imageName = uniqid() . "." . $image->getClientOriginalExtension();
                $image->move("posts", $imageName);
                $images[] = $imageName;
            }
            $post->images = implode("|", $images);
        }

        $post->category_id  = request()->category_id;
        $post->description = request()->description;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect("/profile");
    }


    // setting CRUD section
    public function settingImg()
    {
        $validator = validator(request()->all(), [
            "id" => "required",
            "pf_image" => "required"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $image = request()->pf_image;
        $imageName = time() . "." .  $image->getClientOriginalExtension();
        $image->move("profile_pics", $imageName);
        $user->profile_pic = $imageName;
        $user->save();
        return redirect("/profile");
    }

    public function settingBio()
    {
        $validator = validator(request()->all(), [
            "id" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->bio = substr(htmlspecialchars(request()->bio), 0, 100);
        $user->save();
        return back();
    }

    public function birthDate()
    {
        $validator = validator(request()->all(), [
            "id" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->date_of_birth = substr(htmlspecialchars(request()->date_of_birth), 0, 50);
        $user->save();
        return back();
    }

    public function settingEdu()
    {
        $validator = validator(request()->all(), [
            "id" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->education = substr(htmlspecialchars(request()->education), 0, 100);
        $user->save();
        return back();
    }

    public function settingWorkAt()
    {
        $validator = validator(request()->all(), [
            "id" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->work = substr(htmlspecialchars(request()->work), 0, 100);
        $user->save();
        return back();
    }

    public function settinglive()
    {
        $validator = validator(request()->all(), [
            "id" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->live = substr(htmlspecialchars(request()->live), 0, 100);
        $user->save();
        return back();
    }

    public function settingClose($id)
    {
        $user_email = User::find($id);
        $user_email->email_action = 0;
        $user_email->save();
        return back();
    }

    public function settingOpen($id)
    {
        $user_email = User::find($id);
        $user_email->email_action = 1;
        $user_email->save();
        return back();
    }

    //profile post three dot
    public function postDel($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back();
    }

    public function editPost($id)
    {
        $edit_post = Post::find($id);

        $validator = validator(request()->all(), [
            "title" => "required",
            "images.*" => ["image", "mimes:jpg,png,jpeg,svg,gif"],

            "category_id" => "required",
            "description" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $edit_post->title = request()->title;

        if (request()->images) {
            $images = [];
            foreach (request()->images as $image) {
                $imageName = uniqid() . "." .  $image->getClientOriginalExtension();
                $image->move("posts", $imageName);
                $images[] = $imageName;
            }
            $edit_post->images = implode("|", $images);
        }
        $edit_post->category_id = request()->category_id;
        $edit_post->description = request()->description;
        $edit_post->user_id = auth()->user()->id;
        $edit_post->post_action = "waiting";
        $edit_post->save();
        return redirect("/profile");
    }

    public function commentOff($id)
    {
        $comment = Post::find($id);
        $comment->comments_action = "off";
        $comment->save();
        return back();
    }

    public function commentOn($id)
    {
        $comment = Post::find($id);
        $comment->comments_action = "on";
        $comment->save();
        return back();
    }

    public function printOff($id)
    {
        $comment = Post::find($id);
        $comment->print_action = "off";
        $comment->save();
        return back();
    }

    public function printOn($id)
    {
        $comment = Post::find($id);
        $comment->print_action = "on";
        $comment->save();
        return back();
    }

    //blog detail
    public function blogDetail($id)
    {
        $post_detail = Post::find($id);
        return view("users.parts.blogDetail", [
            "post_detail" => $post_detail
        ]);
    }

    //profile index three dot
    public function postAction($id){
        $hide_data = new Hide();
        $hide_data->post_id = $id;
        $hide_data->user_id = auth()->user()->id;
        $hide_data->action  = "hide";
        $hide_data->save();
        return back();
    }

    public function postShow($id){
        $show = Hide::find($id);
        $show->action = "show";
        $show->save();
        return back();
    }

    public function postHide($id){
        $show = Hide::find($id);
        $show->action = "hide";
        $show->save();
        return back();
    }

    public function postDelete($id){
        $delete = Hide::find($id);
        $delete->delete();
        return back();
    }

    public function reports($id){
        $report = new Report();
        $report->user_id = auth()->user()->id;
        $report->post_id = $id;
        $report->report_type = request()->report_type;
        if(request()->report_reason){
            $report->report_reason  = request()->report_reason;
        }
        $report->save();

        $post = Post::find($id);
        $post->report = "report";
        $post->save();

        return back();
    }
}
