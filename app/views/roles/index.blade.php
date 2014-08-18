@extends('layouts.master')

@section('content')

<h1>All Roles</h1>

<p>{{ link_to_route('roles.create', 'Add new Role') }}</p>

@if ($roles->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Actions</th>
        <th>Name</th>
        <th>Permissions</th>
        <th>Users</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($roles as $role)
    <tr>
        <td>Edit/Delete</td>
        <td>{{$role->name}}</td>
        <td>{{implode(',',$role->perms()->lists('name'))}}</td>
        <td>{{implode(',',$role->users()->lists('username'))}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no roles
@endif

@stop