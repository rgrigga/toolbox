{{--Form::open(array('url'=>'search','method'=>'post'))--}}
{{-- Form::open(array('action' => 'BlogController@postSearch')) --}}

<!-- //I'm not too sure about this.  It's a styling challenge... -->
<!-- I am a little unclear on what all this function does: -->
<!-- Among other things, it does inject a hidden xss helper field -->


<div class="searchbox">
	{{ Form::open(array('url' => 'search')) }}
<!-- http://laravel.com/docs/html#form-model-binding -->
<!-- //echo Form::model($user, array('route' => array('user.update', $user->id))) -->
	<div class="form-group">
		<input name="tag" id="tag" type="text" class="search-query form-control" placeholder="Search for anything" value="">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
	
	{{Form::close()}}
</div>

<!-- //this is hacky as all getout: -->
<!-- A consequence of using the form class -->
<script>
	$(function(){
		$('.searchbox').find('form').addClass('navbar-form');
	});
</script>