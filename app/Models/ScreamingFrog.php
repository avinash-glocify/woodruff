<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScreamingFrog extends Model
{
    protected $guarded = [];

    public function ahrefs()
    {
        return $this->hasMany(Ahref::class, 'link_url', 'address');
    }
}
