<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    // many to many relation with User model
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('progress')
            ->withTimestamps();
    }
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'level',
        'class_code',
    ];
}
