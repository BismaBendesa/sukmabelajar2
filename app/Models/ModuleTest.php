<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleTest extends Model
{
    // one to many relation with Module model
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
