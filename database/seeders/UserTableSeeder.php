<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            "name" => "admin",
            "email" => "admin@test.com",
            "mobile" => "1234567890",
            "password" => bcrypt("123456"),
            "is_admin" => 1
        ]);
    }
}
