<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed roles first
        $this->call(RoleSeeder::class);
        
        // Then seed demo users
        $this->call(DemoUserSeeder::class);
        
        // Finally seed profile data
        $this->call(ProfileDataSeeder::class);
    }
}
