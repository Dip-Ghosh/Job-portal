<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    private $industries = [
        "IT", "Accounts", "Marketing", "Sales", "Banking", "NGO", "Production", "HRM", "Medical", "Design",
        "Data Entry", "Garments/Textile", "Beauty Care", "Research / Consultancy", "Agro"
    ];

    public function run()
    {
        foreach ($this->industries as $industries) {
            Industry::create(['industry_type' => $industries]);
            $this->command->info($industries . " has created successfully");
        }

    }
}
