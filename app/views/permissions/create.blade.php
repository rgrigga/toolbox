<!--/home/ryan/Code/login/app/views/permissions/create.blade.php-->
@extends('layouts.master')

@section('content')

<h1>Create Permission</h1>
@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

{{ Form::open(['route' => 'permissions.store']) }}

<div class="form-group">
    {{ Form::label('name','Name') }}
    {{ Form::text('name') }}
</div>
<div class="form-group">
    {{ Form::label('display_name','Display Name') }}
    {{ Form::text('display_name') }}
</div>


<div class="form-group">
    {{ Form::submit('Submit', array('class' => 'btn')) }}
</div>
{{ Form::close() }}

@stop