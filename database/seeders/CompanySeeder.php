<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Industry;
use App\Models\Organization;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();
        $organizations = Organization::pluck('id');
        $industries = Industry::pluck('id');

        for ($i = 0; $i <= 1; $i++) {
            Company::create([
                "name" => $faker->name(),
                "organizations_id" => $faker->randomElement($organizations),
                "industries_id" => $faker->randomElement($industries),
                "address" => $faker->address(),
                "mobile" => $faker->phoneNumber(),
                "email" => $faker->email(),
                "business_info" => $faker->paragraph(),
                "logo" => $faker->image('public/images', 640, 480, null, false),
                "web_url" => Str::slug($faker->name),
                "status" => 1
            ]);
        }
    }
}
