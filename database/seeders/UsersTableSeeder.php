<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

        
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

                        // Disabilita temporaneamente i vincoli di chiave esterna
                        DB::statement('SET FOREIGN_KEY_CHECKS=0');

                        // Esegui la query per eliminare i dati
                        DB::table('users')->truncate();
                
                        // Riabilita i vincoli di chiave esterna
                        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $users = [
        
            [
                "name" => "John",
                "surname" => "Doe",
                "email" => "john.doe@example.com",
                "password" => bcrypt("password")
            ],
            [
                "name" => "Jane",
                "surname" => "Smith",
                "email" => "jane.smith@example.com",
                "password" => bcrypt("password")
            ],
            [
                "name" => "Michael",
                "surname" => "Johnson",
                "email" => "michael.johnson@example.com",
                "password" => bcrypt("password")
            ],
            [
                "name" => "Sarah",
                "surname" => "Adams",
                "email" => "sarah.adams@example.com",
                "password" => bcrypt("password")
            ],
            [
                "name" => "David",
                "surname" => "Wilson",
                "email" => "david.wilson@example.com",
                "password" => bcrypt("password")
            ],
        ];
        
        foreach ($users as $user){
            $newUser = new User();

            $newUser->name = $user["name"];
            $newUser->surname = $user["surname"];
            $newUser->email = $user["email"];
            $newUser->password = $user["password"];

            $newUser->save();
        }
    }
}
