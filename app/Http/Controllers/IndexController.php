<?php

namespace Train\Http\Controllers;

use Illuminate\Http\Request;
use Train\Message;
use Train\Repositories\ArticlesRepository;
use Train\Repositories\MenusRepository;

class IndexController extends SiteController {

    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep) {

        parent::__construct(new \Train\Repositories\MenusRepository(new \Train\Menu), new \Train\Repositories\ArticlesRepository(new \Train\Article));

        $this->template = env('THEME') . '.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $content = \Train\Index::first();

        $contentIndexPage = view(env('THEME') . '.home')->with('content', $content)->render();
        $this->vars = array_add($this->vars, 'contentIndexPage', $contentIndexPage);
        //$articles = $this->getArticles();


        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'text' => 'required'
        ]);

        $data = $request->all();

        $message = new Message;

        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->text = $data['text'];
        $message->read = 0;
        $result = $message->save();
        if ($result) {
            return redirect()->route('home')->with('status', 'Повідомлення відправлено!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
