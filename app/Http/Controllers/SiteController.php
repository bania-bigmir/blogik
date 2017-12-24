<?php
namespace Train\Http\Controllers;

use Illuminate\Http\Request;

use Train\Http\Requests;



use Train\Repositories\ArticlesRepository;
use Train\Repositories\MenusRepository;


use Menu;
use Config;


class SiteController extends Controller
{
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;
    
    protected $template;
    
    protected $vars = array();
    
    protected $bar = FALSE;
    protected $contentRightBar = FALSE;
    protected $contentLeftBar = FALSE;
    
    public function __construct(MenusRepository $m_rep,ArticlesRepository $a_rep) {

        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;

    }
    
    protected function renderOutput(){

        $menu =$this->getMenu();


        $navigation = view(env('THEME').'.navigation')->with('menu',$menu)->render();

        $this->vars = array_add($this->vars,'navigation',$navigation);

        $articles = $this->getArticles();

        $this->contentRightBar = view(env('THEME').'.rightBar')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'contentRightBar',$this->contentRightBar);

        return   view($this->template)->with($this->vars);
    }
    protected function getArticles(){

        $articles = $this->a_rep->get(['title','created_at','img','alias'],Config::get('settings.home_articles_count'));

        return $articles;
    }



    protected function getMenu(){

        $menu = $this->m_rep->get();

        $mBuilder = Menu::make('MyNav',function ($m) use ($menu){

            foreach ($menu as $item){

                if($item->parent == 0){
                    $m->add($item->title, $item->path)->id($item->id);
                }else{
                    if($m->find($item->parent)){
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }

        });

        // dd($mBuilder);
        return $mBuilder;
    }
    
}
