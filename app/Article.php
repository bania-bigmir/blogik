<?php

namespace Train;

use Image;
use Config;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    use \KodiComponents\Support\Upload;

    /**
     * @param \Illuminate\Http\UploadedFile $file
     */
    public function setUploadImageAttribute(\Illuminate\Http\UploadedFile $file = null) {


        if (is_null($file)) {
            return;
        }


        $str = str_random(8);
        $obj = new \stdClass;

        $obj->mini = $str . '_mini.jpg';
        $obj->max = $str . '_max.jpg';
        $obj->path = $str . '_path.jpg';
        $img = Image::make($file);
        $img->fit(Config::get('settings.image')['width'], Config::get('settings.image')['height'])
                ->save(public_path() . '/' . env('THEME') . '/images/articles/' . $obj->path);
        
        $img->fit(Config::get('settings.articles_img')['max']['width'], Config::get('settings.articles_img')['max']['height'])
                ->save(public_path() . '/' . env('THEME') . '/images/articles/' . $obj->max);
        
        $img->fit(Config::get('settings.articles_img')['mini']['width'], Config::get('settings.articles_img')['mini']['height'])
                ->save(public_path() . '/' . env('THEME') . '/images/articles/' . $obj->mini);

        $this->img = json_encode($obj);
    }

    public function user() {
        return $this->belongsTo('Train\User');
    }

    public function category() {
        return $this->belongsTo('Train\Category');
    }

    public function comments() {
        return $this->hasMany('Train\Comment');
    }

}
