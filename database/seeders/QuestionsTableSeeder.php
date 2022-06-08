<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Question;

class QuestionsTableSeeder extends Seeder
{

    private $questions = [
        [
            'question' => 'Een bla?',
            'answerA' => 'A',
            'answerB' => 'B',
            'answerC' => 'C',
            'answerD' => 'D',
            'correctAnswer' => 'A',
            'points' => 10,
        ]
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->questions as $q) {
            Question::create($q);
        };
    }
}
