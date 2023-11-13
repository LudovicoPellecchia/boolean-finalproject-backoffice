<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsors = [
            [
                "name" => "24 ore",
                "price" => "2.99",
                "premium" => false
            ],
            [
                "name" => "72 ore",
                "price" => "5.99",
                "premium" => false
            ],
            [
                "name" => "144 ore",
                "price" => "9.99",
                "premium" => false
            ]
            ];

            foreach ($sponsors as $sponsor){
                $newSponsor = new Sponsor();
        
                $newSponsor->name = $sponsor["name"];
                $newSponsor->price = $sponsor["price"];
                $newSponsor->premium = $sponsor["premium"];
        
                $newSponsor->save();
            }
        

    }
}
