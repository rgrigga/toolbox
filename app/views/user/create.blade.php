@extends('layouts.master')

@section('content')

<h1>Create user</h1>
@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

{{ Form::open(['route' => 'users.store']) }}

<div class="form-group">
    {{ Form::label('username','Name') }}
    {{ Form::text('username') }}
</div>
<div class="form-group">
    {{ Form::label('email','Email') }}
    {{ Form::text('email') }}
</div>
<div class="form-group">
    {{ Form::label('confirm','Confirmed') }}
    {{ Form::checkbox('confirm',true) }}
</div>
<div class="form-group">
    {{ Form::label('password','Password') }}
    {{ Form::password('password') }}
</div>
<div class="form-group">
    {{ Form::label('password_confirmation','Password-Confirm') }}
    {{ Form::password('password_confirmation') }}
</div>
<div class="form-group">
    {{ Form::submit('Submit', array('class' => 'btn')) }}
</div>
{{ Form::close() }}

@stop