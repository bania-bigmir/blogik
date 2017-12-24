<?php

namespace Train;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article(){
        return $this->belongsTo('Train\Article');
    }
    public function user(){
        return $this->belongsTo('Train\User');
    }
}
