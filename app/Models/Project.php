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

    public function sitemap()
    {
        return $this->hasMany(\App\Models\SiteMaps::class);
    }

    public function csv()
    {
        return $this->hasMany(\App\Models\Csv::class);
    }

    public function googleAnalytics()
    {
        return $this->hasMany(\App\Models\GoogleAnalytics::class);
    }

    public function googleAnalyticsFilter()
    {
        return $this->hasMany(\App\Models\GoogleAnalyticsFilter::class);
    }

    public function googleSearchConsoleFilter()
    {
        return $this->hasMany(\App\Models\GoogleSearchConsoleFilter::class);
    }

    public function searchConsoleFilter()
    {
        return $this->hasMany(\App\Models\SearchConsole::class);
    }

    public function mainKeyword()
    {
        return $this->hasMany(\App\Models\MainKeyword::class);
    }

    public function bestKeywords()
    {
        return $this->hasMany(\App\Models\BestKeywords::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($projcet) {
             $projcet->projectDetails()->delete();
             $projcet->sitemap()->delete();
             $projcet->csv()->delete();
             $projcet->googleAnalytics()->delete();
             $projcet->googleAnalyticsFilter()->delete();
             $projcet->googleSearchConsoleFilter()->delete();
             $projcet->searchConsoleFilter()->delete();
             $projcet->mainKeyword()->delete();
             $projcet->bestKeywords()->delete();
        });
    }
}
