@extends('layouts.master')

@section('content')
<h1>About Ryan</h1>
<?php
$email="ryan.grissinger@gmail.com";
$default="http://lorempixel.com/800/800";
$size=800;
$grav="http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) )
    ."?d=" . urlencode( $default )
    . "&s=" . $size;
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            {{$profile}}
        </div>
        <div class="col-md-6">
            <img src="{{$grav}}" alt="" class="img-responsive img-circle"/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="sidenote">
                <a class="btn btn-info" href="https://docs.google.com/document/d/1cr2syXbro8BVLGoGWavJ-3Uw7w2xwGtNOZKSt6Uwz_Q/edit?usp=sharing">Resume</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
fooot
@parent
@stop