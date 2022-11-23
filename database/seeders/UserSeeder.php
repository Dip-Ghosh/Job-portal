<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            "name" => "admin",
            "email" => "admin@test.com",
            "mobile" => "1234567890",
            "password" => bcrypt("123456"),
            "is_admin" => 1
        ]);
        $this->command->info("User created successfully");
    }
}
