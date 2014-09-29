<?php

class DocsController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {
        $pages=$this->pageList();
        return View::make('docs/index',compact('pages'));
    }

    public function page($page){
        // $path='docs/'.$page;
        // $path='../app/views/docs/';

        $pages = $this->pagelist();

        if(in_array($page, $pages)){
            return View::make('docs/showPage')
                ->nest('menu','nav/docs',compact('pages'))
                ->with(compact('page'));
        }
        else{
            Session::flash("message","That page, <strong>$page</strong>, does not exist.  Make a view called <code>".$page.".blade.php</code> in the <code>views/docs</code> folder.");
            return View::make('docs/index',compact('pages'));
        }
    }

    function pageList($path='../app/views/docs/'){
        $skip=['index','showPage'];
        $mypages=array();
        foreach (glob($path."*.blade.php") as $filename) {
            $filename=str_replace($path, "", $filename);
            $filename=str_replace(".blade.php", "", $filename);
            if(!in_array($filename, $skip))
                array_push($mypages,$filename);
        }
        return $mypages;
    }
}