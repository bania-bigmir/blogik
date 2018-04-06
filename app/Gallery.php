<?php

namespace Train;

use Illuminate\Database\Eloquent\Model;
use Train\Filter;

class Gallery extends Model
{
    protected $table = 'galleries';

    public function filters()
    {
        return $this->belongsToMany(Filter::class,'gallery_filters');
    }


    
}
