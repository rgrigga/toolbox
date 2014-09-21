<?php
App::missing(function($exception)
{
    $uri = Request::path();
    return Response::view('errors.missing', compact('uri'), 404);
});