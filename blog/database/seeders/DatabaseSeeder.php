<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Advertisement::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\AdminSetting::create([
            'address' => 'example address',
            'phone' => '+95 978343232',
            'email_1' => 'examaple@gmail.com',
            'email_2' => 'example@gmail.com',
            'Announcement' => '',
            'facebook' => '',
            'twitter' => '',
            'instagram' => ''
        ]);

        $resons = ["Spam or Advertisement","Hate Speech or Offensive Language","Violent or Threatening Content","False Information","Privacy Violation","Copyright Infringement","Low-Quality Content","Political or Religious Agendas","Trolling or Disruptive Behavior","Others"];

        for($i=0; $i<count($resons); $i++){
            \App\Models\RReason::create([
                'reason' => $resons[$i],
            ]);
        }

        $categories = ["Travel","Software Development","Football","IT","Personal","Knowledge","Nature","News",];

        for($i=0; $i<count($categories); $i++){
            \App\Models\Category::create([
                'category' => $categories[$i],
            ]);
        }
    }
}
