<?php
App::missing(function($exception)
{
    $uri = Request::path();
    $search = "1,2,3";
    return Response::view('errors.missing', compact('uri','search'), 404);
//        ->nest('search','site.partials.searchbox');
//    return View::make('errors.missing', compact('uri'), 404)
//        ->nest('search','site.nav');
});