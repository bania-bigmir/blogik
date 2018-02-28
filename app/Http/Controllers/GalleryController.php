<?php

namespace Train\Http\Controllers;

use Illuminate\Http\Request;
use Train\Gallery;
use Train\Repositories\GalleriesRepository;


class GalleryController extends SiteController
{
    public function __construct(GalleriesRepository $g_rep)
    {

        parent::__construct(new \Train\Repositories\MenusRepository(new \Train\Menu), new \Train\Repositories\ArticlesRepository(new \Train\Article));
        $this->g_rep = $g_rep;

        $this->template = env('THEME') . '.gallery';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->title = 'Галерея';
        $this->meta_desc = 'string';
        $this->keywords = 'string';
        //
        $galleries = $this->getGalleries();



        $content = view(env('THEME') . '.galleries_content')->with('galleries',$galleries)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    public function getGalleries($take=false,$paginate =true)
    {
        $galleries = $this->g_rep->get('*',$take,$paginate);
        if ($galleries){
            $galleries->load('filters');
            $galleries->load('photo');

        }
        return $galleries;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {

$gallery = $this->g_rep->one($alias);

        $gallery->load('photo');

        $this->title=$gallery->name;
        $this->keywords=$gallery->keywords;
        $this->meta_desc=$gallery->meta_desc;

        $galleries = $this->getGalleries(config('settings.galleries'),false);

        $content = view(env('THEME').'.gallery_content')->with(['gallery'=>$gallery,'galleries' =>$galleries])->render();
        $this->vars = array_add($this->vars,'content',$content);



        return $this->renderOutput();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
