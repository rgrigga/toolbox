@extends('layouts.master')

@section('page-header')
<h1>Claim Your Name</h1>
@stop

@section('content')
<section id="signupform">

    <div class="formwrap">
        {{$form}}
    </div>
    <div>
        <?php

        ?>
        <p>Note: email confirmation is not actually required right now.
            If you enter a bogus email, we may just ban traffic from<code>
                {{Request::getClientIp()}}</code>.</p>
        <p>You don't want that, do you? Do us all a favor, and enter a valid email, OK? You'll receive no email unless
            you clearly consent to it later.</p>

    </div>
    <div>
        <h4>Already have an account?</h4>
        <h4>Rather take a tour?</h4>
        <p class="text-center">
            <?= link_to_route('login','Log In',[],['class'=>'btn btn-primary']) ?>
        </p>
    </div>

</section>

@stop

@section('sidebar')
@parent
<div>
    <h3>coming soon</h3>
    <ul class="nav nav-pills nav-stacked">
        <li><a class="btn btn-success" href="google">Login with google</a></li>
        <li><a href="google">Login with google</a></li>
        <li><button class="btn btn-success">Login with Google</button></li>
        <li><button class="btn btn-success">Login with Facebook</button></li>
    </ul>
    <p>It's Easy!</p>
</div>
@stop

@section('footer')
{{$companyinfo}}
@stop