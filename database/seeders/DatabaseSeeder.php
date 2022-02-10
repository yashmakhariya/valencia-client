<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([ 'name' => 'Administrator', 'email' => 'labhansh25@outlook.in', 'role' => '1' , 'password' => Hash::make('12345678')]);
        DB::table('meta_data')->insert([ 'data' => 'gst', 'value' => null ]);
        DB::table('meta_data')->insert([ 'data' => 'shipping', 'value' => null ]);
        DB::table('meta_data')->insert([ 'data' => 'carousel_img_1', 'value' => null ]);
        DB::table('meta_data')->insert([ 'data' => 'carousel_img_2', 'value' => null ]);
        DB::table('meta_data')->insert([ 'data' => 'carousel_img_3', 'value' => null ]);
        DB::table('meta_data')->insert([ 'data' => 'carousel_img_4', 'value' => null ]);
        DB::table('meta_data')->insert([ 'data' => 'carousel_img_5', 'value' => null ]);
    }
}
