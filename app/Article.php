<?php

namespace Train;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
        return   $this->belongsTo('Train\User');
    }
    public function category(){
        return $this->belongsTo('Train\Category');
    }
    public function comments(){
        return $this->hasMany('Train\Comment');
    }
}
