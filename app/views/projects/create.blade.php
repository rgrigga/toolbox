@extends('layouts.master')

@section('content')

<h1>Create project</h1>

{{ Form::open(['route' => 'projects.store']) }}

    <div class="form-group">
        {{ Form::label('name','Name') }}
        {{ Form::text('name',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('link','Link') }}
        {{ Form::text('link',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('owner','Owner') }}
        {{ Form::select('owner',$users,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('votes','Votes') }}
        {{ Form::text('votes',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description','Description') }}
        {{ Form::textarea('description',null,['class'=>'form-control']) }}
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