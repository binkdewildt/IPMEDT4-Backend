<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use \App\Models\User;
use \App\Models\Score;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Score::create([
                'user_id' => User::all()->random()->id,
                'score' => rand(100, 200),
                'created_at' => now(),
            ]);
        };
    }
}
