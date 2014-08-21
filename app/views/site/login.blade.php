@extends('layouts.master')

@section('page-header')
<h1>Login</h1>
@stop

@section('content')
<section id="loginform">
    <div class="formwrap">
        {{$loginform}}
    </div>
    <div>
        <p>Not a member yet?</p>
        <?= link_to_route('signup','Sign Up',[],['class'=>'btn btn-primary']) ?>
    </div>
</section>
@stop

@section('secondary')
{{$security}}
@stop

@section('footer')
{{$companyinfo}}
@stop