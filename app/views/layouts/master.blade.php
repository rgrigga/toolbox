<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All About YOU</title>
<!--    {{HTML::style('assets/bower_components/bootstrap/css/bootstrap.less');}}-->
    {{HTML::style('assets/less/main.less',['rel'=>'stylesheet/less','type'=>'text/css']);}}
    {{HTML::style('assets/bower_components/fontawesome/css/font-awesome.css');}}
    {{HTML::style('assets/css/general.css');}}
    {{HTML::style('assets/css/stickyfooter.css');}}

    {{HTML::script('assets/bower_components/jquery/dist/jquery.min.js');}}
    {{HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');}}
    {{HTML::script('assets/bower_components/bootstrap/js/tooltip.js');}}
    {{HTML::script('assets/bower_components/bootstrap/js/popover.js');}}
    {{HTML::script('assets/bower_components/less/dist/less-1.7.4.min.js');}}

    <script type="text/javascript">
        less.env = "development";
        less.watch();
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

$default="http://lorempixel.com/800/800/business";
$size=800;
$hash=md5( strtolower( trim( $email ) ) );
$grav="http://www.gravatar.com/avatar/" . $hash
    ."?d=" . urlencode( $default )
    . "&s=" . $size;


$profileUrl = "http://www.gravatar.com/".$hash .".php";

try{
    $str=file_get_contents($profileUrl);
    $profile=unserialize($str);
    if(array_key_exists('profileBackground',$profile['entry']['0'])){
        $background = ($profile['entry']['0']['profileBackground']['url'])?:$grav;
    }else{
        $background = $default;
    }
}catch(\Exception $e){
    //do nothing
    $background = $default;
    $str="";
}
$imgUrl=asset('assets/img/Five_petal_flower_icon.svg');

?>
<style>
    table.table-bordered{
        border: 20px solid #8D8D8D;
    }
    body{
        background: url({{$imgUrl}}) no-repeat center center fixed;
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

@section('admin-nav')
@if(Auth::check())
@if(Auth::user()->hasRole('Administrator'))
<h1>Admin nav</h1>
@include('admin.nav')
@endif
@endif

@show
<div id="body-wrap" class="container">
<main>
    @yield('content')
    @yield('main')
</main>
</div>

@section('sidebar')

@show

<!--<code>layouts.master</code>-->

@section('footer')
<div class="footer">
    <code>.footer</code>
    <div class="container">
        <p><a href="http://rgrigga.github.io/toolbox">http://rgrigga.github.io/toolbox</a></p>
        <p class="muted small">&copy; 2014</p>
    </div>
</div>
@show

{{HTML::script('assets/js/main.js');}}
</body>
</html>