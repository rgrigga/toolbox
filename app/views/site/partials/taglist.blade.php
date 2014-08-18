<h3><code>Tag List:</code></h3>
<ul id="alltags">
	@foreach($alltags as $tag=>$count)
	<!-- {{var_dump($tag)}} -->
	<li class="badge"><a href="{{URL::to('tags/'.$tag)}}">{{$tag}}</a></li>
	@endforeach
</ul>
