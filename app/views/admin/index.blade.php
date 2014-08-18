@extends('layouts.master')
@section('content')
<h1>Admin</h1>
<h2>{{ link_to_route('user.index', 'Users') }}</h2>
<ul>
    @foreach(User::all() as $u)
    <li>{{$u->username}}</li>
    @endforeach
</ul>

<h2>{{ link_to_route('projects.index', 'Projects') }}</h2>
<ul>
    @foreach($projects as $p)
    <li>{{$p->name}}</li>
    @endforeach
</ul>

<h2>{{ link_to('companies', 'Companies') }}</h2>
<ul>
    @if(!$companies)
    <li>There are no companies</li>
    <li>{{ link_to('admin/companies/create', 'Add One') }}</li>
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