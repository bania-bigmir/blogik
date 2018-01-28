<?php

namespace Train\Http\Controllers;

use Illuminate\Http\Request;
use Train\Category;
use Train\Article;
use Train\Repositories\ArticlesRepository;
use Train\Repositories\MenusRepository;

class ArticlesController extends SiteController
{
    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep)
    {

        parent::__construct(new \Train\Repositories\MenusRepository(new \Train\Menu), new \Train\Repositories\ArticlesRepository(new \Train\Article));

        $this->template = env('THEME') . '.articles';
    }
    public function index($cat_alias = false)
    {
        //
        $this->title ='Блог';
        $this->meta_desc='string';
        $this->keywords='string';

        $articles = $this->getArticles($cat_alias);
        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }
    public function getArticles($alias=false){
        $where = false;

        if($alias){
            $id = Category::select('id')->where('alias',$alias)->first()->id;
            $where=['category_id',$id];
        }
        $articles = $this->a_rep->get(['id','title','alias','desc','img','created_at','user_id','category_id','keywords','meta_desc'],false,true,$where);

        if($articles){
            $articles->load('category','comments');
        }


        return $articles;
    }
    public  function show($alias = false){


        $article = $this->a_rep->one($alias,['comments'=>true]);
        if($article){
        $prevPostAlias = Article::select('alias')->where([
                ['category_id','=',$article->category_id],
                ['id','<',$article->id]
            ])->orderBy('id', 'desc')->first();
            $nextPostAlias = Article::select('alias')->where([
                ['category_id','=',$article->category_id],
                ['id','>',$article->id]
            ])->orderBy('id', 'asc')->first();



            $article->img=json_decode($article->img);
        }
        $this->title=$article->title;
        $this->keywords=$article->keywords;
        $this->meta_desc=$article->meta_desc;

        $content = view(env('THEME').'.article_content')->with(['article'=>$article,'prevPostAlias'=>$prevPostAlias,'nextPostAlias'=>$nextPostAlias])->render();
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput();
    }
}
