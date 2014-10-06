<?php
$prefix=(Auth::user())?Auth::user()->username . "@" : "";
?>

@section('navbar')
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="primarynav">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{$prefix}}gristech.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                @foreach(explode(',',($company->menus)?:'about') as $menu)
                <li class="nav-item {{ (Route::currentRouteName()==strtolower(trim($menu))) ? 'active' : '' }}">
                    <?= link_to_route(strtolower(trim($menu)),ucfirst(trim($menu))) ?>
                </li>
                @endforeach
                @if(Auth::check())

                @endif

                {{$navcontact}}

            </ul>
            <?php

            //                    dd($company);
//            echo View::make('site.partials.navbar-contact',compact('company'));
            ?>
            <p class="navbar-text">

            </p>
            <ul class="nav navbar-nav navbar-right">

                <li>



                </li>
                @if(!Auth::check())
                <li id="#loginbutton" data-container="body" data-toggle="popover" data-title="more thoughts" data-content="Login!" class="nav-item {{ (Route::currentRouteName()=='login') ? 'active' : '' }}">
                    <?= (!in_array(Route::currentRouteName(),['register','login'])) ? link_to_route('login','Login') : '' ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='login') ? 'active' : '' }}">
                    <?= (!in_array(Route::currentRouteName(),['register','login'])) ? link_to_route('signup','Register') : '' ?>
                </li>
                @else
                <li class="nav-item {{ (Route::currentRouteName()=='projects') ? 'active' : '' }}">
                    <?= link_to_action('ProjectsController@index','Projects') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='profile') ? 'active' : '' }}">
                    <?= link_to_route('profile','Your Profile') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='logout') ? 'active' : '' }}">
                    <?= link_to_route('logout','Logout') ?>
                </li>
                @endif


            </ul>
            @if(Auth::check())
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


@stop

