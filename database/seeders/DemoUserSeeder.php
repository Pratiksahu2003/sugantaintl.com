<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Demo Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Demo Influencer User
        $influencer = User::create([
            'name' => 'Demo Influencer',
            'email' => 'influencer@demo.com',
            'password' => Hash::make('password'),
        ]);
        $influencer->assignRole('influencer');

        // Demo Company User
        $company = User::create([
            'name' => 'Demo Company',
            'email' => 'company@demo.com',
            'password' => Hash::make('password'),
        ]);
        $company->assignRole('company');

        // Additional demo users for each role
        $admin2 = User::create([
            'name' => 'John Admin',
            'email' => 'john.admin@demo.com',
            'password' => Hash::make('password'),
        ]);
        $admin2->assignRole('admin');

        $influencer2 = User::create([
            'name' => 'Sarah Influencer',
            'email' => 'sarah.influencer@demo.com',
            'password' => Hash::make('password'),
        ]);
        $influencer2->assignRole('influencer');

        $company2 = User::create([
            'name' => 'Tech Corp',
            'email' => 'tech.corp@demo.com',
            'password' => Hash::make('password'),
        ]);
        $company2->assignRole('company');
    }
}
