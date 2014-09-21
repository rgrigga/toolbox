@extends('layouts.admin')
@section('content')
<h1>Admin</h1>
<h2>{{ link_to_route('user.index', 'Users') }}</h2>
{{ link_to('admin/users/create', 'Add One') }}
<ul>
    @foreach(User::all() as $u)
    <li>{{$u->username}}</li>
    @endforeach
</ul>

<h2>{{ link_to_route('projects.index', 'Projects') }}</h2>
{{ link_to('admin/projects/create', 'Add One') }}
<ul>
    @foreach($projects as $p)
    <li>{{$p->name}} {{ link_to('projects/'.$p->id.'/edit', 'Edit') }}
    </li>
    @endforeach
</ul>

<h2>{{ link_to('companies.index', 'Companies') }}</h2>

{{ link_to('admin/companies/create', 'Add One') }}
<ul>
    <?php $companies=Company::all(); ?>

    @if(empty($companies))
    <li>There are no companies</li>
    @else
    @foreach($companies as $c)
    <li>{{$c->name}}</li>
    @endforeach
    @endif
</ul>

<h3>Sites</h3>

<ul>
    @foreach($sites as $s)
    <li>{{$s}}</li>
    @endforeach
</ul>
@stop