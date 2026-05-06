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
    public function progress()
    {
        return $this->belongsTo(UserModuleProgress::class, 'user_module_progress_id');
    }

    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
        'is_correct',
        'user_module_progress_id'
    ];
}
