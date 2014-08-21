@extends('layouts.master')

@section('content')

<h1>Create project</h1>
<p>After it's been created, you'll be able to enter pictures and more.</p>
{{ Form::open(['route' => 'projects.store']) }}

    <div class="form-group">
        {{ Form::label('name','Name') }}
        {{ Form::text('name',"MyApp",['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('link','Link') }}
        <p><b>example:</b> myapp.com</p>
        {{ Form::text('link','myapp.com',['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('owner','Owner') }}
        {{ Form::select('owner',$users,(Auth::user()->id)?:"0",['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description','Description') }}
        <p>Keep it short and sweet.</p>
        {{ Form::textarea('description',"This is an awesome thing.",['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Submit', array('class' => 'btn')) }}
    </div>

{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

<div>
    <h4>Existing Projects:</h4>
    @foreach(Project::all() as $p)
    <li>{{$p->name}}</li>
    @endforeach
</div>

@stop