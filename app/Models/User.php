<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Classroom;
use App\Models\UserAnswer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'nim',
        'exp', // ONLY FOR MHS
        'level', // ONLY FOR MHS
        'verification_code',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            if ($user->role !== 'mhs') {
                $user->level = null;
                $user->exp = null;
            }
        });
    }
    // many to many relation with Classroom model
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class)
            ->withPivot('progress')
            ->withTimestamps();
    }

    // one to many relation with UserAnswer model
    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
