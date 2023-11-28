<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;

class AdminController extends Controller
{
    //create category
    public function category(){
        $validator = validator(request()->all(),[
            "category"=> "required"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $category = new Category();
        $category->category = request()->category;
        $category->save();
        return back();


    }

    public function categoryDelete($id){
        $data = Category::find($id);
        $data->delete();
        return back();
    }


    //advertisement section
    public function adverAdd(){
        $validator = validator(request()->all(),[
            "adver_id" => "required",
            "adver_img" => "required"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $advertisement = Advertisement::find(request()->adver_id);
        $image =  request()->adver_img;

        $imageName = time() . "." . $image->getClientOriginalExtension();

        request()->adver_img->move("advertisementImg",$imageName);

        $advertisement->adver_image = $imageName;
        $advertisement->save();
        return back();
    }

    public function adverDelete($id){
        $advertisement = Advertisement::find($id);
        $advertisement->adver_image ="";
        $advertisement->save();
        return back();
    }

    //admin setting section
    public function settingmanagement(){
        $validator = validator(request()->all(),[
            "key_data" => "required",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $key =request()->key_data;
        $adminSetting = AdminSetting::find(1);
        $adminSetting->$key = request()->value_data ?? "";
        $adminSetting->save();
        return back();
    }

    //user controller section
    public function userDel($id){
        $user = User::find($id);
        $user->delete();
        return Back();

    }

    public function userRole($id){
        $user = User::find($id);
        $user->user_roll = "user";
        $user->save();
        return back();
    }

    public function adminRole($id){
        $user = User::find($id);
        $user->user_roll = "admin";
        $user->save();
        return back();
    }


    public function userBan($id){
        $user = User::find($id);
        $user->ban = 1;
        $user->save();
        return back();
    }

    public function userunBan($id){
        $user = User::find($id);
        $user->ban = 0;
        $user->save();
        return back();
    }

    //approve section
    public function approve($id){
        $approve = Post::find($id);
        $approve->post_action = "approve";
        $approve->created_at  = Now();
        $approve->save();
        return back();
    }

    public function reject($id){
        $validator = validator(request()->all(),[
            "reject_type" => "required"
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $post = Post::find($id);
        $post->post_action = "reject";
        $post->rreason_id = request()->reject_type;
        $post->save();
        return back();
    }

    public function approveEverythings($counts){
        $approve_request = Post::where("post_action","waiting")->get();
        foreach($approve_request as $approve){
            $approve->post_action = "approve";
            $approve->save();
        }
        return back();
    }

    //report management section
    public function cancel($id){
        $post = Post::find($id);
        $post->report = "none";
        $post->save();

        $reports = Report::where("post_id",$id)->get();
        foreach($reports as $report){
            $report->delete();
        }
        return back();
    }

    public function reportDelete($id){
        $post = Post::find($id);
        $post->report = "delete";
        $post->save();

        $reports = Report::where("post_id",$id)->get();
        foreach($reports as $report){
            $report->delete();
        }
        return back();
    }

    public function reportShow($id){
        $post = Post::find($id);
        return view("admin.parts.reportShow",[
            "postReports" => $post
        ]);
    }
}
