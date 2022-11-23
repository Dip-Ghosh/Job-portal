<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            "Dhaka", "Faridpur", "Gazipur", "Gopalganj", "Jamalpur", "Kishoreganj", "Madaripur", "Manikganj", "Munshiganj",
            "Mymensingh", "Narayanganj", "Narsingdi", "Netrokona", "Rajbari", "Shariatpur", "Sherpur", "Bogura", "Joypurhat",
            "Naogaon", "Natore", "Nawabganj", "Pabna", "Rajshahi", "Sirajgonj", "Dinajpur", "Gaibandha", "Kurigram",
            "Lalmonirhat", "Nilphamari", "Panchagarh", "Rangpur", "Thakurgaon", "Barguna", "Barishal", "Bhola",
            "Jhalokati", "Patuakhali", "Pirojpur", "Bandarban", "Brahmanbaria", "Chandpur", "Chattogram", "Lakshmipur",
            "Cumilla", "Cox's Bazar", "Feni", "Khagrachari", "Noakhali", "Rangamati", "Habiganj", "Maulvibazar", "Sunamganj",
            "Sylhet", "Bagerhat", "Chuadanga", "Jashore", "Jhenaidah", "Khulna", "Kushtia", "Magura", "Meherpur", "Narail", "Satkhira",
        ];

        foreach ($locations as $location) {
            Location::create(['city_name' => $location]);
        }

        $this->command->info("Location created successfully");
    }
}
