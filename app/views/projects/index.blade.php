@extends('layouts.master')

@section('content')

<h1>Project Index</h1>
<p>An index should always return a list of the resource</p>
<p>{{ link_to_route('projects.create', 'Add new Project') }}</p>
<h2>User's Projects</h2>
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
                    <td>{{$project->owner}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->link}}</td>
				    <td>
                        <p>
                            {{ link_to_route('projects.edit', 'Edit Project',$project->id) }}
                       |
                            {{ link_to_route('projects.destroy', 'Delete Project',$project->id) }}
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
        <td>{{$project->name}}</td>
        <td>{{$project->link}}</td>
        <td>
            <p>
                {{ link_to_route('projects.edit', 'Edit Project',$project->id) }}
                |
                {{ link_to_route('projects.destroy', 'Delete Project',$project->id) }}
            </p>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no User Projects.
@endif
@endif

@stop