<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"kennedy",
            'subname'=>"light",
            'email'=>"kennedylight05@gmail.com",
            'type' => 2,
            'status' => 0,
            'password'=>Hash::make("kazuto kirigaya"),
            'image'=> '1708692719.png',
        ]);
        User::create([
            'name' => "ivan",
            'subname' => "sardigna",
            'email' => "ivan0@gmail.com",
            'type' => 0,
            'status'=>0,
            'password' => Hash::make("ivan0@gmail.com"),
            'image' => '1708692719.png',
        ]);
        User::create([
            'name' => "Cyrille",
            'subname' => "dryx",
            'email' => "dryx@gmail.com",
            'type' => 0,
            'password' => Hash::make("dryx@gmail.com"),
            'image' => '1708692719.png',
            'status' => 0,
        ]);

   }
}