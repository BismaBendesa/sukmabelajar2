<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // one to many relation with Module model
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    // one to many relation with Block model
    public function blocks()
    {
        return $this->hasMany(Block::class)->orderBy('position');
    }
    //  one to one relation with Question model
    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
