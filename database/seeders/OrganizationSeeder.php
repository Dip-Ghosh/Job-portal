<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        $organizationTypes = ["PRIVATE", "GOVT", "SEMI-GOVT", "MULTI-NATIONAL"];

        foreach ($organizationTypes as $organizationType) {
            Organization::create(['organization_type' => $organizationType]);
        }
        $this->command->info("Organization created successfully");
    }
}
