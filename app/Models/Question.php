<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    //* Variables
    protected $table = "questions";
    public $timestamps = false;


    /**
     * The attributes that are visible
     * 
     * @var array
     */
    protected $visible = [
        'id',
        'question',
        'mcQuestion',
        'answerA',
        'answerB',
        'answerC',
        'answerD',
        'correctAnswer',
        'points'
    ];


    //* Methods
}
