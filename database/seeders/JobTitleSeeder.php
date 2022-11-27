<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    public function run()
    {
        $jobTitles = [
            "Software Engineer",
            "Andriod Developer",
            "Programmer", "Java Developer", "C# Developer"
        ];

        foreach ($jobTitles as $jobTitle) {
            JobTitle::create(['title' => $jobTitle]);
        }

        $this->command->info("Job Title created successfully");
    }
}
