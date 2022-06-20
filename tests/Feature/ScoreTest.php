<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use \App\Models\User;

class ScoreTest extends TestCase
{

    /**
     * It tests to get all high scores
     */
    public function test_get_all_high_scores()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/scores');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'user_id',
                    'score',
                    'created_at',
                ]
            ]);
    }


    /**
     * It tests to get my high scores
     */
    public function test_get_my_high_scores()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/scores/me');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'user_id',
                    'score',
                    'created_at',
                ]
            ]);
    }


    /**
     * It tests to store a new score
     */
    public function test_store_new_score()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->postJson('/api/scores', [
            'score' => 109,
            'question' => 1,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'user_id',
                'score',
            ]);
    }


    /**
     * It tests to update a score
     */
    public function test_update_score()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->putJson('/api/scores', [
            'score' => 200,
            'question' => 5,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
            ]);
    }


    public function test_get_my_last_score()
    {
        $this->actingAs(User::factory()->create()->first());
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/scores/last');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'score',
                'question',
                'finished',
            ]);
    }
}
