@extends('layouts.admin')

@section('content')

<h1>Project Index</h1>
<p>An index should always return a list of the resource</p>
<p>{{ link_to_route('projects.create', 'Add new Project') }}</p>
<h2>{{Auth::user()->fullname()}}'s Projects</h2>
@if ($userProjects->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                <th>Owner</th>
                <th>Name</th>
                <th>Link</th>
                <th>Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($userProjects as $project)
				<tr>
                    <td>{{$project->owner()->username}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->link}}</td>
				    <td>
                        <p>
                            {{ link_to_route('projects.show', 'View',$project->id,['class'=>'btn btn-info']) }}
                            {{ link_to_route('projects.edit', 'Edit',$project->id,['class'=>'btn btn-info']) }}
                            {{ link_to_route('projects.destroy', 'Delete',$project->id,['class'=>'btn btn-danger']) }}
                        </p>
                    </td>
                </tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no projects.
@endif

@if(Auth::user()->can('manage_projects'))
<h2>Global Projects</h2>

@if ($projects->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Owner</th>
        <th>Name</th>
        <th>Link</th>
        <th>Actions</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($projects as $project)
    <tr>
        <td>{{$project->owner}}</td>
        <td>
            <div>{{$project->name}}</div>
        </td>
        <td>{{$project->link}}</td>
        <td>
            <p>
                {{ link_to_route('projects.show', 'View',$project->id,['class'=>'btn btn-info']) }}
                {{ link_to_route('projects.edit', 'Edit',$project->id,['class'=>'btn btn-info']) }}
                {{ link_to_route('projects.destroy', 'Delete',$project->id,['class'=>'btn btn-info']) }}

            </p>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no User Projects.
@endif

@else
You do not have Permission to view the global project index.
@endif

@stop