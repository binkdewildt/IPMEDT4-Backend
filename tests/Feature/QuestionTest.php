<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use \App\Models\Question;
use \App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class QuestionTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * It tests the get all questions route.
     */
    public function test_get_all_questions()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->getJson('/api/questions');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'question',
                    'mcQuestion',
                    'answerA',
                    'answerB',
                    'answerC',
                    'answerD',
                    'correctAnswer',
                    'reason',
                    'points',
                ]
            ]);
    }

    /**
     * It tests to store a new question
     */
    public function test_store_new_mc_question_without_permission()
    {
        Sanctum::actingAs(
            User::factory()->create()->first(),
            []
        );

        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->putJson('/api/questions', [
            'question' => "Unit test question?",
            'mcQuestion' => false,
            'answerA' => 'A?',
            'correctAnswer' => 'A',
            'points' => 195,
        ]);

        $response->assertForbidden();
    }


    /**
     * It tests to store a new question
     */
    public function test_store_new_mc_question_with_permission()
    {

        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->putJson('/api/questions', [
            'question' => "Unit test question?",
            'mcQuestion' => false,
            'answerA' => 'A',
            'correctAnswer' => 'A',
            'points' => 195,
        ]);

        $response->assertStatus(200);
    }


    /**
     * It tests to get a single question
     */
    public function test_get_one_question()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->getJson('/api/questions/1');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'question',
                'total',
            ]);
    }


    /**
     * It tests to destroy a single question without admin permissions
     */
    public function test_destroy_one_question_no_permission()
    {
        Sanctum::actingAs(
            User::factory()->create()->first(),
            []
        );

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->delete('/api/questions/1');

        $response->assertForbidden();
    }


    /**
     * It tests to destroy a single question without admin permissions
     */
    public function test_destroy_one_question_with_permission()
    {
        Sanctum::actingAs(
            User::factory()->create()->first(),
            ['is-admin']
        );
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->delete('/api/questions/1');

        $response->assertStatus(200);
    }


    /**
     * It tests to destroy a single question which one is out of range
     */
    public function test_destroy_one_question_out_of_range()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->delete('/api/questions/100');

        $response->assertStatus(400);
    }
}
