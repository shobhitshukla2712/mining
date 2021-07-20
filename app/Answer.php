<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //table-name
    protected $table = 'answers';
    public $timestamps = false;
    //columns to be populated during insert
    protected $fillable = [
        'question_id',
        'user_id',
        'role_id',
        'yes',
        'no',
        'n_a',
        'content'
    ];

}
