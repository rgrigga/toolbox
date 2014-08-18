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
</div>

@stop