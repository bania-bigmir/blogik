<?php

/**
 * Created by PhpStorm.
 * User: home
 * Date: 12.12.2017
 * Time: 11:40
 */

namespace Train\Repositories;

use Train\Gallery;
use Train\Filter;
use Config;
use Illuminate\Support\Facades\Input;

class GalleriesRepository extends Repository {

    public function __construct(Gallery $galleries) {
        $this->model = $galleries;
    }

    public function photos() {
        $photos = [];
        $gallerys = $this->get();
        foreach ($gallerys as $gallery) {
            $photos[] = json_decode($gallery->photos);
        }
        return $photos;
    }

    public function filter($filter) {

        $data = Filter::with('gallery')->where('name', $filter)->get();
        $galleries = $data[0]->gallery;
        
        
        $paginate = Config::get('settings.paginate');
        $page = Input::get('page', 1);
        $offSet = ($page * $paginate) - $paginate;
        
         $itemsForCurrentPage = $galleries->slice($offSet, $paginate);
         
         $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage,count($galleries),$paginate , $page );
        
         $result->setPath('');
         
        return $result;
    }

    public function one($alias, $attr = []) {
        $gallery = parent::one($alias, $attr = []);
        if ($gallery && $gallery->photos) {
            $gallery->photos = json_decode($gallery->photos);
        }
        return $gallery;
    }

}
