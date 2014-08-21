@extends('layouts.master')
@section('content')
<?php

if(!Auth::check()){

}else{

}

if(empty($user)){
    $user=(Auth::user()) ? Auth::user() : null;
}else{ ?>
<h1>{{$user->fullname()}}</h1>
<p>last updated at: <mark>{{$user->updated_at}}</mark></p>

<?php
}
$email=($user) ? $user->email : "ryan.grissinger@gmail.com";
$username=($user) ? $user->username : "Guest";
$default="http://lorempixel.com/600/600/people/ItsAboutPeople";
$size=400;
$hash=md5( strtolower( trim( $email ) ) );
$grav="http://www.gravatar.com/avatar/" . $hash
    ."?d=" . urlencode( $default )
    . "&s=" . $size;


$profileUrl = "http://www.gravatar.com/".$hash .".php";
$str=file_get_contents($profileUrl);
$profile=unserialize($str);

?>


<?php
$location=(array_key_exists('currentLocation',$profile['entry']['0']))?
    $profile['entry']['0']['currentLocation']:"";

$emails=(array_key_exists('emails',$profile['entry']['0']))?
    $profile['entry']['0']['emails']:[];

$formatted=(array_key_exists('formatted',$profile['entry']['0']['name']))?
    $profile['entry']['0']['name']['formatted']:"";
$givenName=(array_key_exists('givenName',$profile['entry']['0']['name']))?
    $profile['entry']['0']['name']['givenName']:"";
$familyName=(array_key_exists('familyName',$profile['entry']['0']['name']))?
    $profile['entry']['0']['name']['familyName']:"";
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-6">
            <p>
                <img src="{{$grav}}" alt="" class="img-circle img-responsive pull-right"/>
            </p>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-6">
            <ul class="list-unstyled">
                <li>Username: {{$username}}</li>
                <li>Email: {{$email}}</li>

                @if( is_array( $profile ) && isset( $profile['entry'] ) )
                <li>Full Name: {{$formatted}}</li>
                <li>First Name: {{$givenName}}</li>
                <li>Last Name: {{$familyName}}</li>
                <li>Current Location: {{$location}}</li>
                @foreach($emails as $item)
                <li>Email: {{$item['value']}}</li>
                @endforeach
                <li>Current Location: {{$location}}</li>
                @endif
            </ul>
            <div>
                <a href="http://en.gravatar.com/profiles/edit/#about-you" class="btn btn-lg btn-primary">Edit Your Profile</a>
            </div>
        </div>
    </div>
</div>


@stop

