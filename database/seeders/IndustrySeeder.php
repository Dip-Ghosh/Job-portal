<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        $industryTypes = [
            "IT", "Accounts", "Marketing", "Sales", "Banking", "NGO", "Production", "HRM", "Medical", "Design",
            "Data Entry", "Garments/Textile", "Beauty Care", "Research / Consultancy", "Agro"
        ];
        foreach ($industryTypes as $industryType) {
            Industry::create(['industry_type' => $industryType]);
        }
        $this->command->info(" Industry has created successfully");
    }
}
