<!-- @extends('site.layouts.default') -->

<!-- View::make('site.pages.pages');
site/pages/pages
aka /pages 
aka pages 
aka index of pages -->

@section('secondary')

<h3>Pagelist:</h3>
<ul class='nav'>
@foreach($pages as $page)
<li><a href="{{URL::to($page)}}">{{$page}}</a></li>
@endforeach
</ul>
@stop