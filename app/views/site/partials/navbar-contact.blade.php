<!-- @ section('contact') -->
<!--<p class="navbar-text navbar-left">-->
<!--    <span>Contact:</span>-->
<!--</p>-->
<ul class="nav navbar-nav navbar-left contact-nav">
    <li>
        <a class="navbar-link" href="mailto:{{$company->email}}">
            <i class="fa fa-2x fa-envelope-o"></i>
        </a>
    </li>
    <li>
        <a class="navbar-link" href="tel:{{$company->phone}}" class="social-icon">
            <i class="fa fa-2x fa-phone-square"></i>
        </a>
    </li>
    <li>
        <a class="navbar-link" href="http://facebook.com/{{$company->facebook}}" class="social-icon">
            <i class="fa fa-2x fa-facebook-square"></i>
        </a>
    </li>
    <li>
        <a class="navbar-link" href="http://twitter.com/{{$company->twitter}}" class="social-icon">
            <i class="fa fa-2x fa-twitter-square"></i>
        </a>
    </li>
    <li>
        <a class="navbar-link" href="http://linkedin.com/{{$company->linkedin}}" class="social-icon">
            <i class="fa fa-2x fa-linkedin-square"></i>
        </a>
    </li>
</ul>
<!--
<style>
    ul.contact-nav{
    li{
    a{
        padding-left: 2px;
        padding-right: 2px;
    }
        }
        }
</style>

-->




