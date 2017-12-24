<?php

namespace Train\Http\Controllers;

use Illuminate\Http\Request;
use Train\Repositories\ArticlesRepository;
use Train\Repositories\MenusRepository;

class ArticlesController extends SiteController
{
    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep)
    {

        parent::__construct(new \Train\Repositories\MenusRepository(new \Train\Menu), new \Train\Repositories\ArticlesRepository(new \Train\Article));

        $this->template = env('THEME') . '.articles';
    }
    public function index()
    {
        //
        $articles = $this->getArticles();
        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content',$content);
//dd($content);
        return $this->renderOutput();
    }
    public function getArticles($alias=false){

        $articles = $this->a_rep->get(['title','alias','desc','img','created_at'],false,true);

        if($articles){
            //$articles->load('category','comments');
        }


        return $articles;
    }
}
