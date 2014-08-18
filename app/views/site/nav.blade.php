<?php
$prefix=(Auth::user())?Auth::user()->username . "@" : "";
?>


@section('navbar')
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{$prefix}}gristech.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                @if(Auth::check())
                <li>
                    <a href="/">/</a>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='home') ? 'active' : '' }}">
                    <?= link_to_route('home','Home') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='about') ? 'active' : '' }}">
                    <?= link_to_route('about','About') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='contact') ? 'active' : '' }}">
                    <?= link_to_action('HomeController@showContact','Contact') ?>
                </li>


<!--                <li class="active"><a href="#">Link</a></li>-->
<!--                <li><a href="#">Link</a></li>-->
<!--                <li class="dropdown">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">One more separated link</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if(!Auth::check())
                <li class="nav-item {{ (Route::currentRouteName()=='login') ? 'active' : '' }}">
                    <?= link_to_route('login','Login') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='login') ? 'active' : '' }}">
                    <?= link_to_route('signup','Register') ?>
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

