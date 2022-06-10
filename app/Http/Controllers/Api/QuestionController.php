<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use \App\Models\Question;
use Exception;

class QuestionController extends Controller
{


    /**
     * It returns a JSON response containing all the questions in the database
     * 
     * @return All the questions in the database.
     */
    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }


    /**
     * It finds the question with the given id and returns it as a JSON object
     * 
     * @param id The id of the question you want to show.
     * 
     * @return The question and the total number of questions.
     */
    public function show($id)
    {
        $question = Question::find($id);
        $length = Question::all()->count();
        return response()->json([
            'question' => $question,
            'total' => $length,
        ]);
    }


    /**
     * It takes a request, validates it, and then saves the question
     * 
     * @param Request request The request object
     * @param Question question The question itself
     * 
     * @return The question is being returned.
     */
    public function store(Request $request, Question $question)
    {

        $validator = Validator::make($request->all(), [
            'question' => 'required|unique:questions|string|max:255',
            'mcQuestion' => 'required|boolean',
            'answerA' => 'string|max:255',
            'answerB' => 'string|max:255',
            'answerC' => 'string|max:255',
            'answerD' => 'string|max:255',
            'correctAnswer' => 'required|string',
            'points' => 'required|integer',
        ]);

        // Returns an error if validation error occur
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        } else {

            // Assign the properties
            $question->question = $request->input('question');
            $question->mcQuestion = $request->input('mcQuestion');
            $question->answerA = $request->input('answerA');
            $question->answerB = $request->input('answerB');
            $question->answerC = $request->input('answerC');
            $question->answerD = $request->input('answerD');
            $question->correctAnswer = $request->input('correctAnswer');
            $question->points = $request->input('points');

            // Try to save the new question
            try {
                $question->save();
                return response()->json($question);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Could not save the question',
                    'error' => $e->getMessage(),
                ], 400);
            }
        }
    }


    /**
     * It deletes the question with the id that is passed in.
     * 
     * @param id The id of the question to be deleted.
     */
    public function destroy($id)
    {

        try {
            $question = Question::findOrFail($id);
            $question->delete();
            return response()->json([], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Could not destroy the question',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
