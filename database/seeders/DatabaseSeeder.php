<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'role'     => 'admin',
            'name'     => 'Admin Ustadz',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'role'     => 'ustadz',
            'name'     => 'ustadz1',
            'email'    => 'ustadz@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
