<?php

namespace Database\Seeders;

use App\Models\Industry;
use App\Models\Organization;
use Faker\Factory;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $industryTypes = ["IT", "Accounts", "Marketing", "Sales", "Banking", "NGO", "Production", "HRM",
            "Medical", "Design", "Data Entry", "Garments/Textile", "Beauty Care", "Research Consultancy", "Agro"];

        $organizations = Organization::pluck('id');

        foreach ($industryTypes as $industryType) {
            Industry::create([
                "organizations_id" => $faker->randomElement($organizations),
                'industry_type' => $industryType
            ]);
        }
        $this->command->info(" Industry has created successfully");
    }
}
