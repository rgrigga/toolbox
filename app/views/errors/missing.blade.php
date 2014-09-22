@extends('layouts.master')
@section('content')
<p class="bg-danger">Your request for "{{$uri}}" was missing!</p>

<h2>Search:</h2>
<p>Would you like to search for this?</p>
<p class="bg-danger">Note: this will not actually work, it's just an early example of a custom 404 page.</p>
<?php
echo View::make('site.partials.searchbox',compact('uri'));
?>
@stop