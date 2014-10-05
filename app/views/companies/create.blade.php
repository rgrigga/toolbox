@extends('layouts.master')

@section('styles')
@parent
    <link rel="stylesheet/less" type="text/css" href="/assets/css/less/master.less" />

<!-- This display's the company's less page -->
    <link rel="stylesheet/less" type="text/css" href="/assets/css/less/{{strtolower($company->brand)}}.less" />

    <script src="/assets/js/less.js" type="text/javascript"></script>
@stop

@section('content')
<?php
// die(var_dump($company));
?>
        @if ($errors->any())
            <div class="row alert-error">
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
            </div>
        @endif
<div class="myformwrapper">
    <h1>Create Company/Brand</h1>

    {{ Form::open(array('route' => 'companies.store','class'=>'form-horizontal myform')) }}


    <ul class="myform">
        <li>
            <div class="form-group">
                {{ Form::label('brand', 'Brand:') }}
                {{ Form::text('brand',null,['placeholder'=>'megacorp']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name',null,['placeholder'=>'The Mega Corporation']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('phone', 'Phone:') }}
                {{ Form::text('phone',null,['placeholder'=>'614.555.1212']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email',null,['placeholder'=>'megacorp@gmail.com']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description',null,['placeholder'=>'Megacorp is awesome.']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('slogan', 'Slogan:') }}
                {{ Form::text('slogan',null,['placeholder'=>'Megacorp Rocks!']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                <span>coming soon: avatar</span>
                {{--Form::label('avatar','Logo:')--}}
                {{--Form::file('avatar',null,['placeholder'=>'megacorp.png'])--}}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('menus', 'Menus:') }}
                {{ Form::text('menus',null,['placeholder'=>'about,demo,help']) }}
            </div>
        </li>
        <li>
            <div class="form-group">
                {{ Form::label('submit', 'Commit changes:') }}
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            </div>
        </li>

    </ul>

    {{ Form::close() }}

</div>
<div class="row">

    <div class="span7">
        <h2>Ideas:</h2>
        <h3>todo:</h3>
        <ul>
            <li>website</li>
            <li>address</li>
            <li>Gravatar::image('thomaswelton@me.com')</li>
            <li><a href="https://github.com/thomaswelton/laravel-gravatar">https://github.com/thomaswelton/laravel-gravatar</a></li>
        </ul>
<pre>
    Script here to create the neccesary folders.
    Or, perhaps a CLI tool to generate a Company
    
    Needed:
        (Where company name is "megacorp")
        mkdir('views/site/megacorp');
        file('analytics.php');
        file('home.blade.php');
        mkdir('views/site/pages/megacorp');
        mkdir('views/site/partials/megacorp');
        image(assets/$company/img/favicon.png)

</pre>



    </div>
</div>


@stop


