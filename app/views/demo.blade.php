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
    {{HTML::script('assets/bower_components/less/dist/less-1.7.4.min.js');}}
    {{HTML::script('assets/js/main.js');}}

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
    <style>
        #kitt-container{
            padding-left: 28%;
            padding-top: 50%;
            z-index: 9999;
            position: fixed;
            top:50px;
            left:0;
            width: 100%;
            height: 100%;
            background-color: black;
        }
        #kitt{
            height: 20px;
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="kitt-container">
    <svg id="kitt" xmlns="http://www.w3.org/2000/svg" viewBox="0 14 32 18" width="32" height="4" fill="#f20" preserveAspectRatio="none">
        <path opacity="0.8" transform="translate(0 0)" d="M2 14 V18 H6 V14z">
            <animateTransform attributeName="transform" type="translate" values="0 0; 24 0; 0 0" dur="2s" begin="0" repeatCount="indefinite" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" calcMode="spline" />
        </path>
        <path opacity="0.5" transform="translate(0 0)" d="M0 14 V18 H8 V14z">
            <animateTransform attributeName="transform" type="translate" values="0 0; 24 0; 0 0" dur="2s" begin="0.1s" repeatCount="indefinite" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" calcMode="spline" />
        </path>
        <path opacity="0.25" transform="translate(0 0)" d="M0 14 V18 H8 V14z">
            <animateTransform attributeName="transform" type="translate" values="0 0; 24 0; 0 0" dur="2s" begin="0.2s" repeatCount="indefinite" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" calcMode="spline" />
        </path>
    </svg>
</div>
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
    <div class="wrapper">
        wrapper


        <div class="content-main">main

            <style>
                @keyframes popup {
                    0% {
                        transform: translateY(150px);
                    }
                    34% {
                        transform: translateY(20px);
                    }
                    37% {
                        transform: translateY(150px);
                    }
                    100% {
                        transform: translateY(150px);
                    }
                }
                .one {
                    transform: translateY(150px);
                    animation: popup 10s 6.5s ease infinite;
                }
                #spinner{
                    height: 100%;
                    width: 100%;
                }


            </style>



            <div class="module">
                <svg xmlns="http://www.w3.org/2000/svg" width="618" height="600" viewBox="0 0 618 600">
                    <title>Five-petal flower icon.</title>
                    <g class="main" transform="translate(309,317.360385) scale(0.303,-0.303)">
                        <path class="one" d="M-427.421 588.294A
427.5811514 427.5811514 0 1 0 427.421 588.294
427.5811514 427.5811514 0 1 0 691.581 -224.708
427.5811514 427.5811514 0 1 0 0 -727.172
427.5811514 427.5811514 0 1 0 -691.581 -224.708
427.5811514 427.5811514 0 1 0 -427.421 588.294Z">

                        </path>
                        <path class="two" fill="#ffde05" d="M349.284 551.237A
352.6711514 352.6711514 0 1 1 -154.312 282.887
322.2388486 322.2388486 0 0 0 154.312 282.887
427.5811514 427.5811514 0 0 0 349.284 551.237Z
M-416.323 502.53A
352.6711514 352.6711514 0 1 1 -316.727 -59.3425
322.2388486 322.2388486 0 0 0 -221.357 234.177
427.5811514 427.5811514 0 0 0 -416.323 502.53Z
M-606.586 -240.657A
352.6711514 352.6711514 0 1 1 -41.4356 -319.563
322.2388486 322.2388486 0 0 0 -291.118 -138.158
427.5811514 427.5811514 0 0 0 -606.586 -240.657Z
M41.4326 -651.264A
352.6711514 352.6711514 0 1 1 291.118 -138.158
322.2388486 322.2388486 0 0 0 41.4356 -319.563
427.5811514 427.5811514 0 0 0 41.4326 -651.264Z
M632.193 -161.847A
352.6711514 352.6711514 0 1 1 221.357 234.177
322.2388486 322.2388486 0 0 0 316.727 -59.3425
427.5811514 427.5811514 0 0 0 632.193 -161.847Z
M247.3288486,0A
247.3288486 247.3288486 0 1 1 -247.3288486,0
247.3288486 247.3288486 0 1 1 247.3288486,0Z"/>
                    </g></svg>
            </div>


        </div>
        <div class="content-secondary">secondary

        </div>
    </div>
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