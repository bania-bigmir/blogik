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
    public function one($alias, $attr = [])
    {
        $article = parent::one($alias, $attr);
        if($article && !empty($attr)){
            $article->load('comments');
            $article->comments->load('user');
        }
        return $article;
    }


}