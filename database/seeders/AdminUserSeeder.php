<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], 
            [
                'names' => 'Admin administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin@1234'), 
                'status' => 1, 
                'user_level'=> 1,
                'email_verified_at' => now(), 
            ]
        );
    }
}
