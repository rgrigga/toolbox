@extends('layouts.master')

@section('messages')
<style>
    body > .container{
        margin-top: 0;
        padding-top: 20px;
    }
    #body-wrap{
        padding-top: 10px;
    }
    div.msg{
        margin-top: 100px;
        margin-bottom: 0px;
        height: 50px;;
        width: 100%;
        text-align: center;
        background-color: darkslategrey;
        color: #f5f5f5;
    }
</style>
<div class="msg navbar">

<p class="navbar-text">Message: {{(isset($message))?:""}}</p>
</div>
@show

@section('content')



<h1>Edit Role</h1>
@if(isset($error))
    <h2>error:</h2>
    <p>{{$error}}</p>
@endif

@if(isset($success))
<h2>success:</h2>
<p>{{$success}}</p>
@endif

{{ Form::model($role, array( 'action' => array('AdminRolesController@postEdit', $role->id))) }}

<div class="form-group">
    {{ Form::label('name','Name') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('permissions','Permissions') }}

    @foreach(Permission::all() as $perm)
        <?php
        $id=$perm->id;
        $name="permissions[".$id."]";
        $has=$role->hasPermission($perm);
        ?>
        <div class="checkbox">
            <label>
                {{ Form::checkbox( "$name" , 'on' , $has ) }}
                {{$perm->name}}
            </label>
        </div>
    @endforeach
</div>
<div class="form-group">
    {{ Form::label('users','Users') }}

    @foreach(User::all() as $user)
    <?php
    $id=$user->id;
    $name="users[".$id."]";
    $has=($user->hasRole($role->name))?"checked":"";
    ?>
    <div class="checkbox">
        <label>
            {{ Form::checkbox( "$name" , true , $has ) }}
            {{$user->username}}
        </label>
    </div>
    @endforeach
</div>
<div class="form-group">
    {{ Form::submit('Submit', array('class' => 'btn')) }}
    {{ link_to_route('roles.show', 'Cancel', $role->id, array('class' => 'btn')) }}
</div>


{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop