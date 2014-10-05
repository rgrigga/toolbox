@extends('layouts.master')

@section('nav')
<!-- @ include('admin') -->
@parent
@stop

@section('styles')
    @parent

    <link rel="stylesheet/less" type="text/css" href="/assets/css/less/master.less" />
    <!-- This display's the company's less page -->
    <!-- bootstrap 2.3.2 -->

    <script src="/assets/js/less.js" type="text/javascript"></script>
@stop

@section('page-header')





<h1>There are <span class="bam">
    {{$companies->count()}}
</span>Active Companies</h1>
<code>views/companies/index</code>
<p>{{ link_to_route('companies.create', 'Add new company') }}</p>
@stop

@section('main')

<style>
/*    #index img{
        width: 200px;
        max-height: 200px;
    }*/
</style>
<h1>All Companies</h1>

<p>{{ link_to_route('companies.create', 'Add new company') }}</p>

@if ($companies->count())
<div class="row">
            <ul class="nav nav-pills nav-stacked">
            @foreach ($companies as $mycompany)
                <li>

                    {{{ $mycompany->name }}}

                    <a href="{{URL::to(strtolower($mycompany->brand))}}">{{$mycompany->brand}}</a>
                </li>
            @endforeach
            </ul>

            @foreach ($companies as $mycompany)

            
            <div class="well span2" id="index">
                <img class="img-responsive" src="{{{asset('assets/'.strtolower($mycompany->brand).'/'.$mycompany->image)}}}" alt="LOGO">

                {{ link_to_route('companies.show', 'Show', array($mycompany->id), array('class' => 'btn btn-info btn-mini')) }}
                {{ link_to_route('companies.edit', 'Edit', array($mycompany->id), array('class' => 'btn btn-info btn-mini')) }}
                <h3>{{{ $mycompany->id }}}: {{{ $mycompany->name }}}</h3>
                {{View::make('site.partials.contact');}}
                <p>{{{ $mycompany->brand }}}</p>
                <p>"{{{ $mycompany->slogan }}}"</p>
                <p>{{ $mycompany->description }}</p>

                <p>{{{ $mycompany->phone }}}</p>
                <p>{{{ $mycompany->email }}}</p>
                <div class="alert alert-danger">
                    <p class="pull-right">Danger!  You will obliterate this company and all of its resources.</p>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('companies.destroy', $mycompany->id))) }}
                    {{ Form::submit('Delete', array('class'=> 'btn btn-danger deleteBtn')) }}
                    {{ Form::close() }}
                </div>
                


            </div>


                
            @endforeach
            </div>
            @else
    There are no companies
@endif


            
@stop
                