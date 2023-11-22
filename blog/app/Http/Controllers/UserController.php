<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
class UserController extends Controller
{
    public function profile(){

        $user_data = User::find(auth()->user()->id);
        $category_data = Category::all();
        return view("users.parts.profile",[
            "category_datas" => $category_data,
            "user_data" => $user_data
        ]);
    }

    public function setting(){
        $user_setting_data = User::find(request()->user()->id);
        return view("users.parts.setting",[
            "user_setting_data" => $user_setting_data
        ]);
    }

    public function createPost(){
        return view("users.parts.createPost");
    }

    public function editPost($id){
        return view("users.parts.editPost");
    }




    // setting CRUD section
    public function settingImg(){
        $validator = validator(request()->all(),[
            "id" => "required",
            "pf_image" => "required"
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $image = request()->pf_image;
        $imageName = time() . "." .  $image->getClientOriginalExtension();
        $image->move("profile_pics",$imageName);
        $user->profile_pic = $imageName;
        $user->save();
        return redirect("/profile");
    }

    public function settingBio(){
        $validator = validator(request()->all(),[
            "id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->bio =substr( htmlspecialchars(request()->bio),0,100);
        $user->save();
        return back();
    }

    public function birthDate(){
        $validator = validator(request()->all(),[
            "id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->date_of_birth =substr( htmlspecialchars(request()->date_of_birth),0,50);
        $user->save();
        return back();
    }

    public function settingEdu(){
        $validator = validator(request()->all(),[
            "id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->education =substr( htmlspecialchars(request()->education),0,100);
        $user->save();
        return back();
    }

    public function settingWorkAt(){
        $validator = validator(request()->all(),[
            "id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->work =substr( htmlspecialchars(request()->work),0,100);
        $user->save();
        return back();
    }

    public function settinglive(){
        $validator = validator(request()->all(),[
            "id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user = User::find(request()->id);
        $user->live =substr( htmlspecialchars(request()->live),0,100);
        $user->save();
        return back();
    }

    public function settingClose($id){
        $user_email = User::find($id);
        $user_email->email_action = 0;
        $user_email->save();
        return back();
    }

    public function settingOpen($id){
        $user_email = User::find($id);
        $user_email->email_action = 1;
        $user_email->save();
        return back();
    }
}
