<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //main user
        $user = [
            [
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" => "12345678",
                "role" => "admin",
                "bio" => "Pain give me strength",
                "birth" => 2004,
                "education" => "Yangon distance Uni",
                "work" => "Web developer",
                "live" => "Yangon",
                "picture" => "a.jpg"
            ],
            [
                "name" => "Alice",
                "email" => "alice@gmail.com",
                "password" => "12345678",
                "role" => "admin",
                "bio" => "enjoy you life",
                "birth" => 2002,
                "education" => "Yangon Uni",
                "work" => "Ui,Ux designer",
                "live" => "Yangon",
                "picture" => "b.jpg"
            ],
            [
                "name" => "Bob",
                "email" => "bob@gmail.com",
                "password" => "12345678",
                "role" => "user",
                "bio" => "Legend new surrender",
                "birth" => 2000,
                "education" => "Yangon Uni",
                "work" => "Game Developer",
                "live" => "Yangon",
                "picture" => "c.jpg"
            ],
            [
                "name" => "Cathazine",
                "email" => "cathazine@gmail.com",
                "password" => "12345678",
                "role" => "user",
                "bio" => "simle",
                "birth" => 2000,
                "education" => "Computer Science at Yangon Uni",
                "work" => "Front-end Developer",
                "live" => "Yangon",
                "picture" => "d.jpg"
            ],
            // [
            //     "name" => "David",
            //     "email" => "david@gmail.com",
            //     "password" => "12345678",
            //     "role" => "user",
            //     "bio" => "Don't live in past",
            //     "birth" => 2004,
            //     "education" => "Business management",
            //     "work" => "Andriod Developer",
            //     "live" => "Yangon",
            //     "picture" => 'e.jpg'
            // ],

        ];

        for ($i = 0; $i < count($user); $i++) {
            \App\Models\User::create([
                'name' => $user[$i]["name"],
                'email' => $user[$i]["email"],
                'user_roll' => $user[$i]["role"],
                'profile_pic' => $user[$i]["picture"],
                'bio' => $user[$i]["bio"],
                'date_of_birth' => $user[$i]["birth"],
                'education' => $user[$i]["education"],
                'work' => $user[$i]["work"],
                'live' => $user[$i]["live"],
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);
        }

        //admin setting
        \App\Models\AdminSetting::create([
            'address' => 'example address',
            'phone' => '+95 978343232',
            'email_1' => 'examaple@gmail.com',
            'email_2' => 'example@gmail.com',
            'Announcement' => '',
            'facebook' => 'https://www.facebook.com/campaign/landing.php',
            'twitter' => 'https://twitter.com/',
            'instagram' => 'https://www.instagram.com/'
        ]);

        //ban reason
        $resons = ["Spam or Advertisement", "Hate Speech or Offensive Language", "Violent or Threatening Content", "False Information", "Privacy Violation", "Copyright Infringement", "Low-Quality Content", "Political or Religious Agendas", "Trolling or Disruptive Behavior", "Others"];

        for ($i = 0; $i < count($resons); $i++) {
            \App\Models\RReason::create([
                'reason' => $resons[$i],
            ]);
        }

        //category section
        $categories = ["Travel", "Software Development", "Football", "IT", "Personal", "Knowledge", "Nature", "News",];

        for ($i = 0; $i < count($categories); $i++) {
            \App\Models\Category::create([
                'category' => $categories[$i],
            ]);
        }

        //user
        \App\Models\User::factory(6)->create();

        //post
        \App\Models\Post::factory(20)->create();

        //comment
        \App\Models\Comment::factory(50)->create();

        //replies
        \App\Models\Reply::factory(50)->create();


        //main purpose is for use
        $info = [
            [
                "title" =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, doloribus.',
                "category_id" => 1,
                "description" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam architecto similique quod, temporibus nihil numquam doloremque. Veniam harum sint laborum eligendi provident incidunt. Sapiente odit nisi repellat recusandae quo! Totam.',
                "user_id" => 1,
                "post_action" => "approve",
                "photo" => "a.jpg"
            ],
            [
                "title" =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, doloribus.',
                "category_id" => 2,
                "description" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam architecto similique quod, temporibus nihil numquam doloremque. Veniam harum sint laborum eligendi provident incidunt. Sapiente odit nisi repellat recusandae quo! Totam.',
                "user_id" => 2,
                "post_action" => "approve",
                "photo" => "b.jpg"
            ],
            [
                "title" =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, doloribus.',
                "category_id" => 3,
                "description" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam architecto similique quod, temporibus nihil numquam doloremque. Veniam harum sint laborum eligendi provident incidunt. Sapiente odit nisi repellat recusandae quo! Totam.',
                "user_id" => 3,
                "post_action" => "approve",
                "photo" => "c.jpg"
            ],
            [
                "title" =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, doloribus.',
                "category_id" => 4,
                "description" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam architecto similique quod, temporibus nihil numquam doloremque. Veniam harum sint laborum eligendi provident incidunt. Sapiente odit nisi repellat recusandae quo! Totam.',
                "user_id" => 4,
                "post_action" => "approve",
                "photo" => "d.jpg"
            ],
            // ---------------------------------------------- wait
            [
                "title" =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, doloribus.',
                "category_id" => 7,
                "description" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam architecto similique quod, temporibus nihil numquam doloremque. Veniam harum sint laborum eligendi provident incidunt. Sapiente odit nisi repellat recusandae quo! Totam.',
                "user_id" => 3,
                "post_action" => "waiting",
                "photo" => "c1.jpg"
            ],
            [
                "title" =>  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, doloribus.',
                "category_id" => 8,
                "description" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam architecto similique quod, temporibus nihil numquam doloremque. Veniam harum sint laborum eligendi provident incidunt. Sapiente odit nisi repellat recusandae quo! Totam.',
                "user_id" => 4,
                "post_action" => "waiting",
                "photo" => null
            ],
        ];

        for($i = 0 ; $i < count($info); $i++){
            \App\Models\Post::create([
                "title" => $info[$i]["title"],
                "category_id"=> $info[$i]["category_id"],
                "description" =>$info[$i]["description"],
                "user_id" => $info[$i]["user_id"],
                "post_action" => $info[$i]["post_action"],
                "images" => $info[$i]["photo"]
            ]);
        }

        //adv img
        $images = ["a.jpg","b.jpg","c.jpg","d.jpg","e.jpg"];
        foreach($images as $image){
            \App\Models\Advertisement::create([
                "adver_image" => $image
            ]);
        }
    }
}
