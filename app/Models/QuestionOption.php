<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $casts = [
        'content' => 'array',
    ];
    // one to many relation with Question model
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
