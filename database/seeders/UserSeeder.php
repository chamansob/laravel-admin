<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            'name' => 'Chaman Rastogi',
            'username'=>'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' =>Hash::make('12345678'),
        ]);
    }
}
