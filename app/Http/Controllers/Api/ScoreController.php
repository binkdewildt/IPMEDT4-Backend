<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use \App\Models\Score;
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
     * It gets the user's id from the request, then gets the top 10 scores for that user, and returns them
     * as JSON
     * 
     * @param Request request This is the request object that is sent to the server.
     * 
     * @return The top 10 scores for the user that is logged in.
     */
    public function show(Request $request)
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
        ]);

        // Returns an error if validation error occur
        if ($validator->fails()) {
            $errors = $validator->errors();
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
}
