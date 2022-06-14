<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'name',
        'question_id',
        'is_correct',
    ];
    
    public function is_correct()
    {
        return ($this->is_correct) ? 'Yes' : 'No';
    }
}
