<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User_type;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user_types = [
            [
               'name'=>'Admin ',
            
            ],
            [
               'name'=>'doctor ',
              
            ],
            [
               'name'=>'patient',
              
            ],
        ];
    
        foreach ($user_types as $key => $user) {
            User_type::create($user);
        }
    }
}
