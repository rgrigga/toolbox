@extends('layouts/master')

@section('sidebar-left')
{{$menu}}
{{--View::make('nav/docs',compact('pages'))--}}
@stop

@section('content')
@if(isset($page))
@include('docs/'.$page)
@endif
@stop
@section('secondary')
<aside>
    <h4>Get Help</h4>
    <a class="btn btn-sm btn-default" href="help">Help Me!</a>
</aside>
@stop
