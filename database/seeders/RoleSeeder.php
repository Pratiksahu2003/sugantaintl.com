<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator with full system access',
            ],
            [
                'name' => 'Influencer',
                'slug' => 'influencer',
                'description' => 'Content creator and influencer',
            ],
            [
                'name' => 'Company',
                'slug' => 'company',
                'description' => 'Business or company account',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
