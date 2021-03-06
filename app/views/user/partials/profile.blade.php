<?php
if(empty($user)){
echo "You are not logged in.";
return false;
}else{ ?>

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
try{
    $str=file_get_contents($profileUrl);
}catch(ErrorException $e){
    $failed=true;
}
//print_r($user);

?>

@if(!empty($failed))
        <div class="">
            The Gravatar profile has not been set up for {{$user->email}}.
        </div>
        <div>
            <a href="http://en.gravatar.com/profiles/edit/#about-you" class="btn btn-lg btn-primary">Create Your Profile</a>
        </div>
@else
<?php
$profile=unserialize($str);
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
<h1>{{$user->fullname()}}</h1>
<p>last updated at: <mark>{{$user->updated_at}}</mark></p>


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
            <p>
                <img src="{{$grav}}" alt="" class="img-circle img-responsive pull-right"/>
            </p>
            <h1>{{$user->fullname()}}</h1>
            <p>last updated at: <mark>{{$user->updated_at}}</mark></p>


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
@endif

