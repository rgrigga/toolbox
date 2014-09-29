<nav>
	<h3>Documentation</h3>
	<ul class="nav">
		<li><a href="/docs"><i class="fa fa-code fa-2x fa-spin"></i> Home</a></li>
		<li><a href="/docs/dealer"><i class="fa fa-code"></i> Dealer</a></li>
		<li><a href="/docs/user"><i class="fa fa-code"></i> User</a></li>
		<li><a href="/docs/images"><i class="fa fa-code"></i> Images</a></li>
	</ul>
	@if(isset($pages))
		<h3>More Info</h3>
		<ul class="nav">
			@foreach($pages as $pagename)
			<li><i class="fa fa-cog fa-2x"></i><a href="/docs/{{$pagename}}">{{$pagename}}</a></li>
			@endforeach
		</ul>
	@endif
</nav>