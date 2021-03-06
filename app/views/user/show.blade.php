/Code/login/app/views/projects/show.blade.php
@extends('layouts.master')

@section('content')

<h1>All {{Models}}</h1>

<p>{{ link_to_route('{{models}}.create', 'Add new {{model}}') }}</p>

@if (${{models}}->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				{{headings}}
			</tr>
		</thead>

		<tbody>
			@foreach (${{models}} as ${{model}})
				<tr>
					{{fields}}
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no {{models}}
@endif

@stop