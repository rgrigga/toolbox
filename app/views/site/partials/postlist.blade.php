<h3>Postlist:</h3>
<heading>{{(isset($heading)?$heading:"Post Heading")}}</heading>

<section>
	<section>
		<ul>
			@foreach ($posts as $post)
			<li>
				<h5>{{{$post->title}}}</h5>

				<a href="{{$post->url()}}">{{{$post->slug}}}</a>
			</li>
			@endforeach
		</ul>
		
	</section>
</section>
