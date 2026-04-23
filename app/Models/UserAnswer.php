<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    // one to many relation with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // one to many relation with Question model
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
