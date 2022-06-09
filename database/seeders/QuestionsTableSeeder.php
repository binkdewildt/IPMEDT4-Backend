<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Question;

class QuestionsTableSeeder extends Seeder
{

    private $questions = [
        [
            'question' => 'Voor wie is deze applicatie bedoelt?',
            'mcQuestion' => true,
            'answerA' => 'De shiftleader',
            'answerB' => 'De medewerkers',
            'answerC' => 'Zowel de shiftleader als de medewerkers',
            'answerD' => 'Geen van beide',
            'correctAnswer' => 'A',
            'points' => 10,
        ],
        [
            'question' => 'Hoeveel zakken per uur is de norm van PostNL?',
            'mcQuestion' => false,
            'answerA' => null,
            'answerB' => null,
            'answerC' => null,
            'answerD' => null,
            'correctAnswer' => '680',
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
