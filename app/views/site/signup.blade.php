@extends('layouts.master')

@section('page-header')
<h1>Sign Up</h1>
@stop

@section('content')
<section id="signupform">

    <div class="formwrap">
        {{$form}}
    </div>
    <div>
        <p>Already have an account?</p>
        <?= link_to_route('login','Log In',[],['class'=>'btn btn-primary']) ?>
    </div>
</section>
@stop

@section('footer')
{{$companyinfo}}
@stop