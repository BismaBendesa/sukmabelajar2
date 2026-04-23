<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $casts = [
        'content' => 'array',
    ];
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
