<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 12.12.2017
 * Time: 11:40
 */

namespace Train\Repositories;

use Train\Gallery;


class GalleriesRepository extends Repository
{
    public function __construct(Gallery $galleries)
    {
        $this->model = $galleries;
    }

public function one($alias,$attr=[]){
       $gallery = parent::one($alias,$attr=[]);
    //if($gallery && $gallery->preview){
//    $gallery->preview =json_decode( $gallery->preview);
//}
    return $gallery;
}

}