
@if(!isset($menus))
<?php $menus=array('Menus','not','set') ?>
@endif

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Admin</a>
    </div>

    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @foreach($menus as $menu)
<li>
    {{link_to(strtolower($menu),$menu)}}
</li>
            @endforeach
            <li><a href="//dev.agrivault.com">Dashboard</a></li>
        </ul>

    </div>
</nav>