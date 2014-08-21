@extends('admin/layouts/default')
<!-- SITE.PAGES.CONTACT -->
<!-- class="full-width" -->
<!-- http://www.tinymce.com/ -->
<!-- http://stackoverflow.com/questions/11968072/twitter-bootstrap-button-click-to-toggle-expand-collapse-text-section-above-butt -->

<!-- @ extends('site.layouts.bs3') -->
<!-- //this is a structural document.  other docs can be called -->
<!-- //from here, but styles should be kept in a theme somewhere else. -->
@section('styles')
@parent
	<link rel="stylesheet/less" type="text/css" href="/assets/css/less/master.less" />

	<!-- This display's the company's less page -->
	<link rel="stylesheet/less" type="text/css" href="/assets/css/less/{{strtolower($company->brand)}}.less" />

	<script src="/assets/js/less.js" type="text/javascript"></script>
@stop
{{-- Web site Title --}}
@section('title')
@parent
@stop

@section('page-header')

<div class="text-center">
	<!-- //copy and edit buttons -->
				@if (Auth::check())
	                @if (Auth::user()->hasRole('admin'))
{{View::make('site.partials.postlist',compact($posts))}}
					<p>
						<a href="{{{ URL::to('admin/blogs/' . $post->id . '/edit' ) }}}" class="btn btn-danger">{{{ Lang::get('button.edit') }}}</a>
						<!-- <a href="{{{ URL::to('admin/blogs/' . $post->id . '/delete' ) }}}" class="btn btn-mini btn-danger">{{{ Lang::get('button.delete') }}}</a> -->
					</p>
					@endif
				@endif
		<h4>
			There have been {{{ $comments->count() }}} comments.
		</h4>
		<h3>{{{$post->title}}}</h3>
		<p>{{$post->description}}</p>
		<p>{{$post->content}}</p>
		<p>{{$post->img()}}</p>
		Leave a comment, anonymously or otherwise.
		<form method="post" action="{{{ URL::to('blog/'.$post->slug) }}}">

			<input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />

			<textarea class="input-block-level" rows="4" name="comment" id="comment">{{{ Request::old('comment') }}}</textarea>

			<div class="control-group">
				<div class="controls">
					<input type="submit" class="btn" id="submit" value="Send Message" /> as 
				@if (Auth::check())
					<b>{{{Auth::user()->username}}}</b>
					 or <button class="btn btn-info" href="{{URL::to('user/logout')}}">Logout First</button>
				@else
					Anonymous or <button class="btn btn-info" href="{{URL::to('user/login')}}">Login First</button>
				@endif
				</div>
			</div>
		</form>
</div>

<section>
	
</section>
@stop
{{-- Content --}}
@section('main')
<!-- <div class="page-header"> -->
<section>
<div class="jumbotron">
	<h1>Contact</h1>
	<p>You can leave a public, anonymous comment on this page.</p>
	<p>If you ask for help, I will respond quickly.
	Any serious/productive request, feedback, or critique, however formal or informal, is appreciated.</p> 
</div>
	<p>Or, If you want say something obnoxious, this is the place to do it: just say "hello world" or "I hate the Buckeyes."</p>
	<p>(PS: Don't badmouth the Buckeyes here, or elsewhere.  If you say anything nice about Michigan, your comment is likely to be deleted.)</p>
	
	<?php
	// var_dump($posts);
	?>

</section>




<!-- </div> -->
<!-- <div class="main"> -->
@include('site.partials.contact')
<!-- </div> -->


<footer>

</footer>
@stop

@section('secondary')

<!-- Comments -->
<div class="comments">
	&nbsp;<i class="icon-user"></i> by <span class="muted">{{{ $post->author->username }}}</span>
	| <i class="icon-calendar"></i> <!--Sept 16th, 2012-->{{{ $post->date() }}}
	| <i class="icon-comment"></i> <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
</div>

<section class="comment-list">
	<!-- //This is interesting: post->comments returns ascending.  I have called comments up in the BlogController@getContact, but it's not necessary. -->
	@foreach($comments as $comment)
	<h1>{{$comment->id}}</h1>
	<blockquote><h3>{{$comment->content}}</h3>
		{{--$comment->content--}}
		<small>{{$comment->author->username}}, {{$comment->updated_at}}</small>
	</blockquote>
	

	@endforeach
</section>

<p>If you haven't figured it out yet, this is the comment demo page.  It's also a useful place to display, demonstrate, test, and discuss things like </p>
<ul>
	<li>Website Security</li>
	<li>Spam</li>
	<li>Captcha</li>
	<li>User/Group Management</li>
</ul>
<p>...etc.  If you just want to mess with my mind, do it here. Please just don't cross the line of obnoxious profanity and such.  I can delete comments, and block IP adresses, and so on, but... I'd like to leave this page open for entertainment and experimentation.  Please just behave yourself.</p>
@stop