	<div class="navbar navbar-fixed-top navbar-inverse user-top">
      <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
          </button>

        
          <a class="navbar-brand" href="/"> <i class="icon-home"></i> {{{$company->brand}}}</a>
		</div>
        <div class="navbar-collapse collapse">

			<ul class="nav navbar-nav">

			<!--<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('#') }}}">Home</a></li> -->

			<!-- @ include('site.partials.search') -->
			@foreach ($company->menus() as $menu)
				<li {{ (Request::is('{{{$menu}}}') ? ' class="active"' : '') }}><a href="{{{URL::to($menu)}}}">{{{ucfirst($menu)}}}</a></li>
			@endforeach
				<li>@include('site.partials.searchbox')</li>
			</ul>


<!--           <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul> -->
			<!-- admin/user nav -->
	        <ul class="nav pull-right navbar-nav">
	            @if (Auth::check())
	                @if (Auth::user()->hasRole('admin'))

	                    <li{{ (Request::is('admin/blogs/create*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/blogs/create') }}}"><i class="icon-bullhorn icon-white"></i> New</a></li>

	                    <li><a href="{{{ URL::to('admin') }}}">Dash</a></li>
	                @endif
	                <li><a href="{{{ URL::to('user') }}}">Name: {{{ Auth::user()->username }}}</a></li>
	                <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
	            @else
	                <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
	                
	            @endif
	        </ul>
@include('site.partials.contact')

<!--           <form class="navbar-form form-inline pull-right">
            <input type="text" placeholder="Email">
            <input type="password" placeholder="Password">
            <button type="submit" class="btn">Sign in</button>
          </form> -->

        </div><!--/.nav-collapse -->
      </div><!-- /.container -->

<!-- 		<div class="india pull-right">
			<div>
				<img src="http://gristech.com/img/contactus.png" alt="contact us">
			</div>
		</div> -->
    
    </div><!-- /.navbar -->



		<style>

		.contentwrap{
			/*margin-top: 60px;*/
		}
		.navbar-fixed-top{
			/*position:fixed;*/
			/*margin-bottom: 80px;*/
		}
		.body{
			/*padding-top: 60px;*/
		}
		.iconbar{
			float: right;
			display: inline;
			font-size: 32px;
		}

		</style>

