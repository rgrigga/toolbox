<!--/Code/login/app/views/screenshots/index.blade.php-->
@extends('layouts.master')

@section('content')

<h1>All Screenshots</h1>

<p>{{ link_to_route('screenshots.create', 'Add new screenshot') }}</p>

@if ($screenshots->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				{{$headings}}
			</tr>
		</thead>

		<tbody>
			@foreach ($screenshots as $screenshot)
				<tr>
					{{$fields}}
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no screenshots
@endif

@stop