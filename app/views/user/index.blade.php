@extends('layouts.master')

@section('content')

<h1>User List</h1>

<p>{{ link_to_route('users.create', 'Add new User') }}</p>

@if ($users->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Confirmed</th>
                <th>Projects</th>
                <th>Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{implode(',',$user->roles()->lists('name'))}}</td>
                    <td>{{($user->confirmed)?"Yes":"No"}}</td>
                    <td>{{count($user->projects)}}</td>
                    <td>
                        <p>
                            {{ link_to_route('users.edit', 'Edit',$user->id) }}
                        </p>
                    </td>
                </tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no users.
@endif

@stop