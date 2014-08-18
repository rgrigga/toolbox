<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All About YOU</title>
    {{HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.css');}}
    {{HTML::style('assets/css/general.css');}}
    {{HTML::style('assets/css/stickyfooter.css');}}
    {{HTML::script('assets/bower_components/jquery/dist/jquery.min.js');}}
    {{HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');}}
</head>
<body>

<?php
if(Route::currentRouteName()=='about'){
    $email="ryan.grissinger@gmail.com";
} else{
    if(Auth::user()){
        $email= Auth::user()->email;
    }else{
        $email="ryan.grissinger@gmail.com";
    }
}

$default="http://lorempixel.com/800/800";
$size=800;
$hash=md5( strtolower( trim( $email ) ) );
$grav="http://www.gravatar.com/avatar/" . $hash
    ."?d=" . urlencode( $default )
    . "&s=" . $size;


$profileUrl = "http://www.gravatar.com/".$hash .".php";
$str=file_get_contents($profileUrl);
$profile=unserialize($str);
if(array_key_exists('profileBackground',$profile['entry']['0'])){
    $background = ($profile['entry']['0']['profileBackground']['url'])?:$grav;
}else{
    $background = $default;
}
?>
<style>
    body{
        background: url({{$background}}) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    #body-wrap{
        /*position: fixed;*/
        /*top:0;*/
        /*left: 0;*/
        height: 100%;
        width: 100%;
        background-color:rgba(200, 200, 200, 0.7);
    }
    /*.img-wrap > img{*/
    /*position: fixed;*/
    /*top:0;*/
    /*left:0;*/
    /*width: 100%;*/
    /*}*/
</style>
@include('site.nav')
@section('navbar')
This is the master navbar.
@show

@if(Auth::check())
@section('admin-nav')
<h1>Admin nav</h1>
@include('admin.nav')
@endif

@show
<div id="body-wrap" class="container">
    @yield('content')
    @yield('main')
</div>

@section('sidebar')
@show

<!--<code>layouts.master</code>-->

@section('footer')
<div class="footer">
    <div class="container">
        <p class="muted">&copy; 2014</p>
    </div>
</div>
@show

</body>
</html>