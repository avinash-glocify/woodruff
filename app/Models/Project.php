<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function sitemap()
    {
        return $this->hasMany(\App\Models\SiteMaps::class);
    }


    public function googleSearchConsole()
    {
        return $this->hasMany(\App\Models\GoogleSearchConsole::class);
    }

    public function ahrefs()
    {
        return $this->hasMany(\App\Models\Ahref::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($projcet) {
             $projcet->sitemap()->delete();
             $projcet->googleSearchConsole()->delete();
             $projcet->ahrefs()->delete();
        });
    }
}
