<?php

namespace Train;

use Illuminate\Database\Eloquent\Model;
use Train\Gallery;

class Filter extends Model
{
    protected $table = 'filters';
    public function gallery()
    {
        return $this->belongsToMany(Gallery::class,'gallery_filters');
    }
}
