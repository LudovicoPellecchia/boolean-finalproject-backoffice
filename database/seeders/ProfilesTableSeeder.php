<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                "user_id" => 1,
                "photo" => "john.jpg",
                "phone" => "123-456-7890",
                "location" => "New York",
                "skills" => "Network Security, Data Protection",
                "description" => "Cybersecurity expert with 10 years of experience.",
                "curriculum" => "Bachelor's in Cybersecurity",
                "visible" => true
            ],
            [
                "user_id" => 2,
                "photo" => "jane.jpg",
                "phone" => "987-654-3210",
                "location" => "Los Angeles",
                "skills" => "Network Security, Firewall Configuration",
                "description" => "Certified cybersecurity professional specializing in network security.",
                "curriculum" => "Master's in Cybersecurity",
                "visible" => true
            ],
            [
                "user_id" => 3,
                "photo" => "michael.jpg",
                "phone" => "555-555-5555",
                "location" => "Chicago",
                "skills" => "Data Protection, Risk Management",
                "description" => "Experienced cybersecurity consultant with a focus on data protection.",
                "curriculum" => "Bachelor's in Computer Science",
                "visible" => true
            ],
            [
                "user_id" => 4,
                "photo" => "sarah.jpg",
                "phone" => "333-333-3333",
                "location" => "Houston",
                "skills" => "Threat Detection, Incident Response",
                "description" => "Cybersecurity analyst with expertise in threat detection and response.",
                "curriculum" => "Master's in Information Security",
                "visible" => false
            ],
            [
                "user_id" => 5,
                "photo" => "david.jpg",
                "phone" => "999-999-9999",
                "location" => "Miami",
                "skills" => "Risk Management, Compliance",
                "description" => "Security consultant specializing in risk management.",
                "curriculum" => "Ph.D. in Cybersecurity",
                "visible" => true
            ]
        ];
        

        foreach ($profiles as $profile){
            $newProfile = new Profile();

            $newProfile->user_id = $profile["user_id"];
            $newProfile->photo = $profile["photo"];
            $newProfile->phone = $profile["phone"];
            $newProfile->location = $profile["location"];
            $newProfile->skills = $profile["skills"];
            $newProfile->description = $profile["description"];
            $newProfile->curriculum = $profile["curriculum"];
            $newProfile->visible = $profile["visible"];

            $newProfile->save();
        }
    }
}
