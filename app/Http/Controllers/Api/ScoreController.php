<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use \App\Models\Score;
use \App\Models\Question;
use Exception;

class ScoreController extends Controller
{

    /**
     * It returns the top 10 scores from the database in JSON format
     * 
     * @return A JSON object containing the top 10 scores.
     */
    public function index()
    {
        $scores = Score::orderBy('score', 'DESC')->limit(10)->get();
        return response()->json($scores);
    }


    /**
     * It returns the score of the user, the amount of questions answered and whether the user has finished
     * the quiz
     * 
     * @param Request request The request object
     * 
     * @return The score, the amount of questions answered, and if the user has finished the quiz.
     */
    public function show(Request $request)
    {

        try {
            $questionAmount = Question::all()->count();
            $me = $request->user()->id;
            $score = Score::where('user_id', '=', $me)->orderBy('created_at', 'desc')->firstOrFail();

            // If its finished, dont send it
            if ($score->answeredQuestions === $questionAmount - 1) {
                return response()->json([]);
            }

            return response()->json([
                'total' => Question::all()->count(),
                'id' => $score->id,
                'score' => $score->score,
                'question' => $score->answeredQuestions,
                'finished' => $score->answeredQuestions === $questionAmount - 1,
            ]);
        } catch (Exception $e) {
            return response()->json([], 200);
        }
    }


    /**
     * It gets the user's id from the request, then gets the top 10 scores for that user, and returns them
     * as JSON
     * 
     * @param Request request This is the request object that is sent to the server.
     * 
     * @return The top 10 scores for the user that is logged in.
     */
    public function myScores(Request $request)
    {
        $me = $request->user()->id;
        $scores = Score::where('user_id', '=', $me)->orderBy('score', 'DESC')->take(10)->get();
        return response()->json($scores);
    }


    /**
     * It takes a request, validates the request, and then saves the score to the database
     * 
     * @param Request request The request object.
     * @param Score score The score of the user
     * 
     * @return The score is being returned.
     */
    public function store(Request $request, Score $score)
    {
        $validator = Validator::make($request->all(), [
            'score' => 'required|integer',
            'question' => 'required|integer',
        ]);

        // Returns an error if validation error occur
        if ($validator->fails()) {
            return response()->json([
                'error' => 'The score must be valid.',
            ], 400);
        } else {

            $me = $request->user()->id;
            $score->user_id = $me;
            $score->score = $request->input('score');

            // Try to save the new question
            try {
                $score->save();
                return response()->json($score);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Could not save the score',
                    'error' => $e->getMessage(),
                ], 400);
            }
        }
    }


    /**
     * It updates the score of the user who is currently logged in
     * 
     * @param Request request This is the request object that contains the data sent from the client.
     * 
     * @return The score is being returned.
     */
    public function update(Request $request)
    {
        $me = $request->user()->id;
        $id = $request->input('id');

        $score = Score::where([
            ['id', '=', $id],
            ['user_id', '=', $me]
        ])->orderBy('created_at', 'DESC')->first();

        // Update the score
        if ($score !== null) {
            Score::where([
                ['id', '=', $id],
                ['user_id', '=', $me]
            ])->orderBy('created_at', 'DESC')->first()->update([
                'score' => $request->input('score'),
                'answeredQuestions' => $request->input('question'),
            ]);

            return response()->json([
                'message' => "Score has been updated.",
                'score' => $score,
            ], 200);
        }

        // Create the score
        else {
            $newId = Score::create([
                'user_id' => $me,
                "score" => $request->input('score'),
                "answeredQuestions" => $request->input('question')
            ])->id;

            return response()->json([
                'id' => $newId,
                'message' => "Score has been created",
            ], 200);
        }

        // Return response




        // Score::updateOrCreate(
        //     ['user_id' => $me],
        //     []
        // );

        // try {
        //     Score::where('user_id', '=', $me)
        //         ->orderBy('created_at', 'DESC')
        //         ->firstOrFail()
        //         ->update([
        //             "user_id" => $me,
        //             'score' => $request->input('score'),
        //             'answeredQuestions' => $request->input('question'),
        //         ]);

        //     return response()->json([
        //         'message' => "Score has been updated"
        //     ], 200);
        // } catch (Exception $e) {
        //     return response()->json([
        //         'message' => "Please start a game first before updating score",
        //         'a' => $e->getMessage(),
        //     ], 400);
        // }
    }
}
