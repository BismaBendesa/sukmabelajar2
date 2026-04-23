<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
        'explanation' => 'array',
    ];
    // one to one relation with Page model
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // one to many relation with QuestionOption model
    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    // one to many relation with UserAnswer model
    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
