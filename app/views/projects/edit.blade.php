@extends('layouts.master')

@section('content')
<div class="alert alert-danger">
    <p class="pull-right">Danger!  This button will obliterate this project and all of its resources.</p>
    {{ Form::open(array('method' => 'DELETE', 'route' => array('projects.destroy', $project->id))) }}
    {{ Form::submit('Delete Project', array('class'=> 'btn btn-danger deleteBtn')) }}
    {{ Form::close() }}
</div>
<h1>Edit Project</h1>
{{ Form::model($project, array('method' => 'PATCH','files'=>true, 'route' => array('projects.update', $project->id))) }}

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
    {{ Form::label('description','Description') }}
    {{ Form::textarea('description',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('image','Primary Image') }}
    {{ Form::select('image',$project->screenshots()->lists('path','id'),$project->image,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('screenshots','Screenshots') }}
    {{ Form::file('screen') }}
</div>

<div class="form-group">
    {{ Form::submit('Submit', array('class' => 'btn')) }}
    {{ link_to_route('projects.show', 'Cancel', $project->id, array('class' => 'btn')) }}
</div>
{{ Form::close() }}

<div id="screenlist">
    <h2>Screenshots</h2>


    @foreach($project->screenshots()->get() as $screen)
    <div class="row">
        <div class="col-md-4">
            {{ Form::open(array('route' => array('screenshots.destroy', $screen->id), 'method' => 'delete')) }}
            <button type="submit" href="{{ URL::route('screenshots.destroy', $screen->id) }}" class="btn btn-danger btn-mini">Delete</button>
            {{ Form::close() }}
            <button class="btn btn-primary">
                Set as primary
            </button>
            {{$screen->path}}
        </div>

        <div class="col-md-6">
            <img class="thumb-lg thumbnail" src="{{asset($screen->path)}}" alt=""/>
        </div>
    </div>

    @endforeach
</div>

<div class="bam">BAM</div>


@stop