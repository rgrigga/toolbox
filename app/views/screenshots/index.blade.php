@extends('layouts.admin')

@section('content')

<h1>screenshot Index</h1>
<p>An index should always return a list of the resource</p>
<p>{{ link_to_route('screenshots.create', 'Add new screenshot') }}</p>
<h2>User's screenshots</h2>
@if ($screenshots->count())
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
    @foreach ($userscreenshots as $screenshot)
    <tr>
        <td>{{$screenshot->owner}}</td>
        <td>{{$screenshot->name}}</td>
        <td>{{$screenshot->link}}</td>
        <td>
            <p>
                {{ link_to_route('screenshots.show', 'View',$screenshot->id,['class'=>'btn btn-info']) }}
                {{ link_to_route('screenshots.edit', 'Edit',$screenshot->id,['class'=>'btn btn-info']) }}
                {{ link_to_route('screenshots.destroy', 'Delete',$screenshot->id,['class'=>'btn btn-danger']) }}
            </p>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no screenshots.
@endif

@if(Auth::user()->can('manage_screenshots'))
<h2>Global screenshots</h2>

@if ($screenshots->count())
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
    @foreach ($screenshots as $screenshot)
    <tr>
        <td>{{$screenshot->owner}}</td>
        <td>
            <div>{{$screenshot->name}}</div>
        </td>
        <td>{{$screenshot->link}}</td>
        <td>
            <p>
                {{ link_to_route('screenshots.show', 'View',$screenshot->id,['class'=>'btn btn-info']) }}
                {{ link_to_route('screenshots.edit', 'Edit',$screenshot->id,['class'=>'btn btn-info']) }}
                {{ link_to_route('screenshots.destroy', 'Delete',$screenshot->id,['class'=>'btn btn-info']) }}

            </p>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
There are no User screenshots.
@endif
@endif

@stop