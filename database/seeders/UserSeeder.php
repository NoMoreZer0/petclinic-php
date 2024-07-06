<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->makeOne([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'super_admin',
            'password' => bcrypt('admin'),
        ]);
        $user->save();
    }
}
