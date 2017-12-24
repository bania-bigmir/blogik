<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 12.12.2017
 * Time: 11:40
 */

namespace Train\Repositories;


use Train\Article;

class ArticlesRepository extends Repository
{
    public function __construct(Article $articles)
    {
        $this->model = $articles;
    }


}