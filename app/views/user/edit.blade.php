@extends('layouts.master')

@section('content')

<h1>Edit User</h1>
<h2>msg:</h2>
@if(isset($success))
<div class="alert alert-success">{{$success}}</div>
@endif
@if(isset($error))
<div class="alert alert-error">{{$error}}</div>
@endif

@if ($errors->any())
<h4>ERROR</h4>
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

{{ Form::model( $user , array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}



<div class="form-group">
    {{ Form::label('username','Userame') }}
    {{ Form::text('username') }}
</div>
<div class="form-group">
    {{ Form::label('email','Email') }}
    {{ Form::text('email') }}
</div>
<div class="form-group">
    {{ Form::label('confirmed','Confirmed') }}
    {{ Form::checkbox('confirmed') }}
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



<h4>Roles</h4>
@foreach($roles as $role)

{{$role->name}}
@endforeach
<h4>Permissions</h4>
@foreach($permissions as $perm)
{{$perm->name}}
@endforeach
@stop