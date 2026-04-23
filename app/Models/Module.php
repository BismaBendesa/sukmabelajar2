<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($module) {
            $slug = Str::slug($module->title);
            $count = \App\Models\Module::where('slug', 'LIKE', "{$slug}%")->count();

            $module->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
    // many to one relation with Classroom model
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    // one to one relation with ModuleMaterial model
    public function material()
    {
        return $this->hasOne(ModuleMaterial::class);
    }
    // one to one relation with ModuleTest model
    public function test()
    {
        return $this->hasOne(ModuleTest::class);
    }
    // one to many relation with Page model
    public function pages()
    {
        return $this->hasMany(Page::class)->orderBy('position');
    }
}
