<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Classroom extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($classroom) {
            $slug = Str::slug($classroom->name);
            $count = \App\Models\Classroom::where('slug', 'LIKE', "{$slug}%")->count();

            $classroom->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
    // many to many relation with User model
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('progress')
            ->withTimestamps();
    }

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('position');
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
