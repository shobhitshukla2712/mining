<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //table-name
    protected $table = 'question';
    public $timestamps = false;
    //columns to be populated during insert
    protected $fillable = [
        'question',
        'role_id'
    ];

}
