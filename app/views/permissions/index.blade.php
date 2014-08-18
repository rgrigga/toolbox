@extends('layouts.master')

@section('content')

<h1>All Permissions</h1>

<p>{{ link_to_route('permissions.create', 'Add new permission') }}</p>

@if ($permissions->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Actions</th>
        <th>Display Name</th>
        <th>Name</th>
        <th>Roles</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($permissions as $permission)
    <tr>
        <td>Edit/Delete</td>
        <td>{{$permission->display_name}}</td>
        <td>{{$permission->name}}</td>
        <td>{{implode(',',$permission->roles()->lists('name'))}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no Permissions
@endif

@stop