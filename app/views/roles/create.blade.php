/home/ryan/Code/login/app/views/roles/create.blade.php
@extends('layouts.master')

@section('content')

<h1>Create Role</h1>
@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

{{ Form::open(['route' => 'roles.store']) }}

<div class="form-group">
    {{ Form::label('name','Name') }}
    {{ Form::text('name') }}
</div>

<div class="form-group">
    {{ Form::label('permissions','Permissions') }}
    {{ Form::text('permissions') }}
</div>

<div class="form-group">
    {{ Form::submit('Submit', array('class' => 'btn')) }}
</div>
{{ Form::close() }}

@stop