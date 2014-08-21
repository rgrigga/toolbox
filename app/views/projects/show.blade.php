@extends('layouts.master')

@section('content')

<h1>{{$project->name}}</h1>
<h2>Screenshots</h2>
<div class="row">
    <div class="col-md-8">
        <p>{{$project->image()}}</p>
    </div>
    <div class="col-md-4">
        <div class="row">
            @foreach( $project->screenshots()->get() as $screen )
            <div class="col-sm-3 col-md-12 col-lg-12">
                <a class="thumbnail" href="#">
                    <img src="{{ asset( $screen->path ) }}" alt="{{ $screen->path }}"/>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div>{{$project->id}}</div>
<div>{{$project->owner()->username}}</div>
<div>{{$project->created_at}}</div>
<div>{{$project->updated_at}}</div>
<div>{{$project->description}}</div>
<p>{{ link_to_route('projects.edit', 'Edit' ,$project->id) }}</p>
<p>{{ link_to_route('projects.create', 'Add new project') }}</p>



</ul>


@if (Auth::user()->projects()->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
			</tr>
		</thead>

		<tbody>
			@foreach (Auth::user()->projects()->get() as $project)
				<tr>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no projects
@endif

@stop