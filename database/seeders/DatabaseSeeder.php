<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([OrganizationSeeder::class]);
        $this->call([IndustrySeeder::class]);
        $this->call([LocationSeeder::class]);
        $this->call([JobTitleSeeder::class]);
        $this->call([CompanySeeder::class]);
    }
}
