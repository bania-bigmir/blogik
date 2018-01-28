<?php

namespace Train;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    public function gallery()
    {
        return $this->belongsTo('Train\Gallery');
    }
}
