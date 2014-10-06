<!-- @ section('contact') -->
<!--<p class="navbar-text navbar-left">-->
<!--    <span>Contact:</span>-->
<!--</p>-->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <span class="caret"></span></a>

    <ul class="dropdown-menu" role="menu">
        @if($company->email)
        <li>
            <a class="navbar-link" href="mailto:{{$company->email}}">
                <i class="fa fa-2x fa-envelope-o"></i> {{$company->email}}
            </a>
        </li>
        <li class="divider"></li>
        @endif
        @if($company->phone)
        <li>
            <a class="navbar-link" href="tel:{{$company->phone}}" class="social-icon">
                <i class="fa fa-2x fa-phone-square"></i> {{$company->phone}}
            </a>
        </li>
        @endif
        @if($company->facebook)
        <li>
            <a class="navbar-link" href="http://facebook.com/{{$company->facebook}}" class="social-icon">
                <i class="fa fa-2x fa-facebook-square"></i> {{$company->facebook}}
            </a>
        </li>
        @endif
        @if($company->twitter)
        <li>
            <a class="navbar-link" href="http://twitter.com/{{$company->twitter}}" class="social-icon">
                <i class="fa fa-2x fa-twitter-square"></i> <?= '@' ?>{{$company->twitter}}
            </a>
        </li>
        @endif
        @if($company->linkedin)
        <li>
            <a class="navbar-link" href="http://linkedin.com/in/{{$company->linkedin}}" class="social-icon">
                <i class="fa fa-2x fa-linkedin-square"></i> {{$company->linkedin}}
            </a>
        </li>
        @endif
    </ul>
</li>


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




