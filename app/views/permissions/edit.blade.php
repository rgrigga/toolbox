@extends('layouts.master')

@section('content')

<h1>Edit Permission</h1>
{{ Form::model($permission, array('method' => 'PATCH', 'route' => array('permissions.update', $permission->id))) }}

<div class="form-group">
    {{ Form::label('name','Name') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('display_name','display_name') }}
    {{ Form::text('display_name',null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('roles','roles') }}

    @foreach(role::all() as $role)
    <?php
    $id=$role->id;
    $name="roles[".$id."]";
    $has=$role->hasPermission($permission);
    ?>
    <div class="checkbox">
        <label>
            {{ Form::checkbox( "$name" , 'on' , $has ) }}
            {{$role->name}}
        </label>
    </div>
    @endforeach
</div>

<div class="form-group">
    {{ Form::submit('Submit', array('class' => 'btn')) }}
    {{ link_to_route('permissions.show', 'Cancel', $permission->id, array('class' => 'btn')) }}
</div>


{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop