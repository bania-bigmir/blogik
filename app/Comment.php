<?php

namespace Train;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['name','text','user_id','article_id','parent_id','email'];
    public function article(){
        return $this->belongsTo('Train\Article');
    }
    public function user(){
        return $this->belongsTo('Train\User');
    }
}
