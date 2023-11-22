<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Advertisement;

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
            "value_data" => "required"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $key =request()->key_data;
        $adminSetting = AdminSetting::find(1);
        $adminSetting->$key = request()->value_data;
        $adminSetting->save();
        return back();
    }
}
