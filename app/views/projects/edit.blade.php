/Code/login/app/views/projects/edit.blade.php
@extends('layouts.master')

@section('content')

<h1>Edit Project</h1>
{{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}

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
    {{ Form::select('owner',$users,$project->owner,['class'=>'form-control']) }}
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
    {{ link_to_route('projects.show', 'Cancel', $project->id, array('class' => 'btn')) }}
</div>


{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop