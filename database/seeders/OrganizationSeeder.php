<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{

    private $orgs = ["PRIVATE", "GOVT", "SEMI-GOVT", "MULTI-NATIONAL"];

    public function run()
    {
        foreach ($this->orgs as $org) {
            Organization::create(['organization_type' => $org]);
            $this->command->info($org . " has created successfully");
        }

    }
}
