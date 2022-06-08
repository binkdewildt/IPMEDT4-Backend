<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use \App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factory of 10 random users
        User::factory()
            ->count(10)
            ->create();

        // Create admin user
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("admin123"),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
