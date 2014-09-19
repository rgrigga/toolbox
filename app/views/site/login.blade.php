@extends('layouts.master')

@section('page-header')
<h1>Login</h1>
@stop

@section('content')
<section id="loginform">
    <div class="formwrap">
        {{$loginform}}
    </div>
</section>
<section class="codesample">

    <code>section:codesample</code>
<?php
$url="https://github.com/rgrigga/toolbox/blob/master/public/assets/less/login.less";
$eot=<<<'EOT'
@import "../../assets/bower_components/bootstrap/less/variables.less";
@import "../../assets/bower_components/bootstrap/less/mixins.less";
@import "../../assets/less/colors.less";

.secondary{
  .make-sm-column(3);
  background-color: fade(@pomegranate,70%);
  padding-top: 1em;
  padding-bottom: 1em;
  p{
    color: lightgrey;
  }
}
main{
  .make-sm-column(9);
}
section.sidebar{
  .make-sm-column(3);

}
#status ul{
  list-style: none;
}
EOT;
?>
    <h5>from <code>login.less</code>: <a href="{{$url}}">view source</a></h5>
    <pre><code><?= htmlentities($eot); ?></code></pre>
</section>

@stop

@section('secondary')
<section class="secondary">
<!--    <code>secondary</code>-->

    <div class="well">
        <h4>Don't have a login yet?</h4>
        <p class="text-center">
            <?= link_to_route('signup','Create User',[],['class'=>'btn btn-primary']) ?>
        </p>
    </div>
    <div>
        <h4>Prefer a Demo?</h4>
        <p class="text-center">Just want to take this baby for a test drive?</p>
        <p class="text-center">You can login like this:</p>
        <p class="text-center">Username: <mark><b>demo</b></mark></p>
        <p class="text-center">Password: <mark><b>password</b></mark></p>
    </div>
    <div id="status">
        <h4>Should it work?</h4>
        <ul>
            @foreach([
            'login',
            'migrations',
            'seeds',
            'rememberme',
            '',

            ] as $item)
            <li><span class="badge alert-success">Yes</span> {{$item}}</li>
            @endforeach

            @foreach(['email'] as $item)
            <li><span class="badge alert-danger">No</span> {{$item}}</li>
            @endforeach

            @foreach(['unit tests'] as $item)
            <li><span class="badge alert-warning">Maybe</span> {{$item}}</li>
            @endforeach
        </ul>
    </div>

</section>


<!--@{{$security}}-->
@stop

@section('footer')
{{$companyinfo}}
@stop

@section('sidebar-left')

@overwrite