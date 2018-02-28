<?php

namespace Train\Http\Controllers;

use Illuminate\Http\Request;
use Train\Repositories\ArticlesRepository;
use Train\Repositories\MenusRepository;

class ErrorController extends SiteController
{
    //
    public function __construct(MenusRepository $m_rep,ArticlesRepository $a_rep) {

        parent::__construct( new \Train\Repositories\MenusRepository(new \Train\Menu),new \Train\Repositories\ArticlesRepository(new \Train\Article));

        $this->template = env('THEME').'.404';
    }
     public function index()
    {

         
        
        return $this->renderOutput();
    }
}
