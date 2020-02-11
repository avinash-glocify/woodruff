<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function projectDetails()
    {
        return $this->hasMany(\App\Models\ProjectDetail::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($projcet) {
             $projcet->projectDetails()->delete();
        });
    }
}
