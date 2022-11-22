<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([UserTableSeeder::class]);
        $this->call([OrganizationSeeder::class]);
        $this->call([IndustrySeeder::class]);
        $this->call([LocationSeeder::class]);
    }
}
