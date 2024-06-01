<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SiteSetting::insert([
            'logo' => '',
            'favicon' => 'admin',
            'site_title' => 'Quiz System',
            'app_name' => 'Quiz System', 
             'style' => 1,     
            'created_at' => date("Y-m-d H:i:s"),
             'updated_at'=> date("Y-m-d H:i:s")
        ]);
    }
}
