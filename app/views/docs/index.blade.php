@extends('layouts/master')

@section('sidebar-left')
{{View::make('nav/docs',compact('pages'))}}
@stop

@section('content')
<h1>Documentation</h1>

@include('docs.help')
<!-- @ include('docs.database') -->
<!-- @ include('docs.generators') -->



@endsection