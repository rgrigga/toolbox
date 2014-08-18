<!-- @ section('contact') -->
<div class="iconbar" id="contact">
<!-- 	<div class="iconbutton">
	
	</div> -->
    <span>Contact:</span>
    <a href="mailto:{{$company->email}}">
        <i class="fa fa-envelope-o"></i>
        <!-- <img src="http://gristech.com/buttons/email.png" class="img-circle"> -->
    </a>
    <a href="tel:{{$company->phone}}" class="social-icon">
        <i class="fa fa-phone-square"></i>
        <!-- <img src="http://gristech.com/buttons/email.png" class="img-circle"> -->
    </a>
	<a href="http://facebook.com/{{$company->facebook}}" class="social-icon">
	    <!-- <img src="http://gristech.com/img/facebook.png" class="img-circle"> -->
        <i class="fa fa-facebook-square"></i>
	</a>
    <a href="http://twitter.com/{{$company->twitter}}" class="social-icon">

    	<i class="fa fa-twitter-square"></i>
        <!-- <img src="http://gristech.com/img/twitter.png" class="img-circle"> -->
    </a>
    <a href="http://linkedin.com/{{$company->linkedin}}" class="social-icon">
    	<i class="fa fa-linkedin-square"></i>
        <!-- <img src="http://gristech.com/buttons/linkedin.png" class="img-circle"> -->
    </a>
</div>