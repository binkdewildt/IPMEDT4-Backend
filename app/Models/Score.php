<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    //* Variables
    protected $table = 'scores';
    public $timestamps = false;


    /**
     * The attributes that are visible
     * 
     * @var array
     */
    protected $visible = [
        'user_id',
        'score',
        'created_at',
    ];

    protected $fillable = [
        'score',
        'question',
    ];


    //* Methods
}
