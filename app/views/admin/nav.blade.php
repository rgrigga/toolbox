@section('admin-nav')

<style>
    .navbar-secondary{
        background-color: black;
        margin-top: 50px;
    }
    body > .container{
        padding-top: 110px;
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top navbar-secondary" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#admin-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="admin-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <li class="nav-item {{ (Route::currentRouteName()=='companies') ? 'active' : '' }}">
                    <?= link_to_route('admin.index','Dashboard') ?>
                </li>
                <li ">
                    <?= link_to_route('companies.index','Companies') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='projects') ? 'active' : '' }}">
                    <?= link_to_route('projects.index','Projects') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='users') ? 'active' : '' }}">
                    <?= link_to_action('AdminUsersController@getIndex','Users') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='roles') ? 'active' : '' }}">
                    <?= link_to_action('AdminRolesController@getIndex','Roles') ?>
                </li>
                <li class="nav-item {{ (Route::currentRouteName()=='perms') ? 'active' : '' }}">
                    <?= link_to_route('permissions.index','Perms') ?>
                </li>


                <!--                <li class="active"><a href="#">Link</a></li>-->
                <!--                <li><a href="#">Link</a></li>-->
                <!--                <li class="dropdown">-->
                <!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>-->
                <!--                    <ul class="dropdown-menu" role="menu">-->
                <!--                        <li><a href="#">Action</a></li>-->
                <!--                        <li><a href="#">Another action</a></li>-->
                <!--                        <li><a href="#">Something else here</a></li>-->
                <!--                        <li class="divider"></li>-->
                <!--                        <li><a href="#">Separated link</a></li>-->
                <!--                        <li class="divider"></li>-->
                <!--                        <li><a href="#">One more separated link</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

@stop