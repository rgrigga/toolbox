@extends('site.layouts.bs3')
<!-- This is the production page -->

@section('styles')
@parent
        <!-- @ stylesheets("myapp-css") -->

		@stylesheets('gristech')

		<!-- <link rel="stylesheet/less" type="text/css" href="/assets/css/less/demo.less" /> -->
		<link rel="stylesheet/less" type="text/css" href="/assets/css/less/tools.less" />

<script src="/assets/js/less.js" type="text/javascript"></script>
		

<!--
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
	-->
<!--
		<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
-->
	    <!-- <link href="assets/dist/css/bootstrap.css" rel="stylesheet" media="screen"> -->
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="../../assets/js/html5shiv.js"></script>
	      <script src="../../assets/js/respond.min.js"></script>
	    <![endif]-->
<style>
	.container {
  /*padding-left: 15px;*/
  /*padding-right: 15px;*/
}


    </style>

<link rel="stylesheet" href="/assets/css/bubbles.css">
<link rel="stylesheet" href="assets/css/triangles.css">
<style>

	.jumbotron img{
		max-width: 100%;
	}
	/*.jumbotron{*/
		/*font-family: font-awesome;*/
	/*}*/
	/*.golf {*/
		/*color: white;*/
		/*background-color: #4C58AD;*/
		/*background-opacity:50%;*/
		/*font-family: font-awesome;*/
		/*margin:10px;*/
		/*border-radius: 30px;*/
	    /*background-color: #cccccc;*/
	    /*box-shadow: 10px 10px 5px #666666;*/
	    /*padding: 0px;*/
	    /*border-width: 0px;*/
  		/*border-color: #4C58AD;*/
	/*}*/

	.thumbnail img {
		max-width: 100%;
	}

.contentwrap{
	padding-top: 0px;
}
</style>

@stop

<?php 
$mylist="php,js,css,less,opensource,jquery,OAuth,git,bootstrap";
$array=explode(",", $mylist);
?>

@section('secondary')
Affix <i class="icon-arrow-down"></i>
<div class="sidebar affix">
	<ul class="nav">
		@foreach($array as $topic)
		<li><a href="#{{$topic}}">{{$topic}}</a></li>
		@endforeach
	</ul>
</div>
@stop

@section('page-header')
<!-- <div class="jumbotron"> -->
	<h1>Toolbox<small> building blocks</small></h1>


<!-- our new, semanticized HTML -->
<!-- <article>
  <section class="main">secion.main</section>
  <aside><a href="#" class="annoying">Click me!</a></aside>
</article>
 -->
<!-- </div> -->
<!-- jumbotron -->

	<p>On this page, you will find a pleathora of tools to make life easy.  Each resource has links to tutorials, downloads, Q&A, and so on.  Have a nice day!</p>
@stop

@section('content')

<!-- /////////////// JUMBOTRON //////////////// -->

<div class="jumbotron">
	<img src="" alt="">
		<img src="{{asset('assets/img/mini-tools.jpg')}}" alt="">

	<!-- <p>If you're interested...</p> -->
	<h5><em>Modular, Extensible, Expressive, Elegant, Simple</em>
	</h5>
	<!-- <p class="lead">These are the qualities that make good code great.</p> -->
</div>


<!-- NAVBAR -->
<h5>Navbar:</h5>
<nav class="navbar">
	<ul class="nav navbar-nav">
		<li class="btn">
			<a href="http://www.hitreach.co.uk/perfect-web-page/">The Anatomy of a Web Page</a>
		</li>
		<li class="btn">
			<a href="https://github.com/cheeaun/mooeditable/wiki/Alternative-Javascript-WYSIWYG-editors#lightweight-versions">WYSIWYG</a>
		</li>
		<li class="btn">
			<a href="http://stackoverflow.com/questions/92720/jquery-javascript-to-replace-broken-images">replace-broken-images</a>
		</li>
	</ul>
</nav>

<h1>HTML5, Laravel Code Generator <small>rgrigga</small></h1>
<!--  -->

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Example
        </a>
      </h2>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
		<!-- START -->


		<p>turn this:</p>
		<pre class="prettyprint"><code>$mylist="{{{$mylist}}}";</code></pre>
		<?php 
		$str="";
		$str2="";
		$str3="";
		?>

		@foreach($array as $topic)
		<?php

		$str.="\t".'<li><a href="#'.$topic.'">'.$topic.'</a></li>'.PHP_EOL;

		////////////STR2
		$em="<em>".$topic."</em>";
		$open='<section id="'.$topic.'">';
		$close='</section>';
		$str2.=$open.PHP_EOL."\t".$em.PHP_EOL.$close.PHP_EOL;
		// $str2.='<section id="'.$topic.'">section:'.$topic.'</section>
		// ';
		$ob='{'.'{';
		$cb="}"."}";
		$bracketed=$ob.$topic.$cb;
		$a='<a href="#'.$topic.'">'.'<i class="icon-link"></i> '.$topic.'</a>';
		$search='<a href="search/'.$topic.'">'.'<i class="icon-search"></i> this site: '.$topic.'</a>';
		$h1="<h1>".$a."</h1>";
		$p="<p>".$topic."</p>";
		$img="<img src='".$ob."asset('assets/img/".$topic.".png')".$cb."' onerror=\"imgError(this);\" alt=\"".$topic."\">";
		?>
		<a href=""></a>
		<!-- <h1>{{$topic}}</h1> -->
		<?php

		// $str3.=$bracketed;
		$str3.=$open.PHP_EOL;
		$str3.="\t".$h1.PHP_EOL;
		$str3.="\t".$search.PHP_EOL;
		$str3.="\t".$p.PHP_EOL;
		// $str3.="\t".$img.PHP_EOL;
		$str3.=$close.PHP_EOL;
		?>
		@endforeach

		<?php $str='<ul class="nav">'.PHP_EOL.$str.'</ul>'; ?>


		<p>into this:</p>
		<pre class="prettyprint"><code>{{{$str}}}</code></pre>


		<p>and/or this:</p>
		<pre class="prettyprint"><code>{{{$str2}}}</code></pre>


		<!-- END INNER PANEL -->
      </div>
    </div>
  </div>
  <!-- END PANEL GROUP -->
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Workspace
        </a>
      </h2>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">

		<pre class="prettyprint"><code>{{{$str3}}}</code></pre>
      </div>
    </div>
  </div>
  <!-- END GROUP -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          How it works
        </a>
      </h2>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <p>Edit the array inside this page.  Change the array, customize the "template", and then, PHP will generate the desired output inside a "pre" tag.  There are a few gotcha's regarding escaping of quotes that have been worked out.</p>
        <p>This is is a useful tool to help quickly generate repetitive, detailed code.</p>
      </div>
    </div>
  </div>
<!-- END GROUP -->
</div>
<!-- END PANELS -->


<!-- http://css-tricks.com/snippets/css/prevent-long-urls-from-breaking-out-of-container/ -->



{{--$str3--}}

<section id="php">
	<h1><a href="#php"><i class="icon-link"></i> php</a></h1>
	<h2>Language</h2>
	<a href="search/php"><i class="icon-search"></i> this site: php</a>
	<div class="well">
		<img src="{{asset('assets/img/logo/php-med-trans.png')}}" alt="php">
		<a href="http://www.comentum.com/php-vs-asp.net-comparison.html">PHP vs. asp.net</a>
		<a href="http://www.bin-co.com/php/articles/current_file_path.php">php print current path</a>
	</div>
</section>
<section id="js">
	<h1><a href="#js"><i class="icon-link"></i> javascript</a></h1>
	<a href="search/js"><i class="icon-search"></i> this site: js</a>
	<p>js</p>
	<ul>
		<li><a href="http://net.tutsplus.com/tutorials/javascript-ajax/required-javascript-reading/">Required Reading</a></li>
		<li>
			<a href="http://myapp.gristech.com/pages/js">Playground</a>
		</li>
		<li>
			<a href="http://jsbooks.revolunet.com/">JS Books</a>
		</li>
		<li><a href="https://github.com/learn-js/learnjs/blob/master/readme.md#learnjs">Learn.js</a></li>
	</ul>
</section>
<section id="css">
	<h1><a href="#css"><i class="icon-link"></i> css</a></h1>
	<a href="search/css"><i class="icon-search"></i> this site: css</a>
	<p>css</p>
</section>
<section id="less">
	<h1><a href="#less"><i class="icon-link"></i> less</a></h1>
	<a href="search/less"><i class="icon-search"></i> this site: less</a>
	<p>less</p>
</section>
<section id="opensource">
	<h1><a href="#opensource"><i class="icon-link"></i> opensource</a></h1>
	<a href="search/opensource"><i class="icon-search"></i> this site: opensource</a>
	<p>opensource</p>
</section>
<section id="jquery">
	<h1><a href="#jquery"><i class="icon-link"></i> jquery</a></h1>
	<a href="search/jquery"><i class="icon-search"></i> this site: jquery</a>
	<p>jquery</p>
</section>
<section id="OAuth">
	<h1><a href="#OAuth"><i class="icon-link"></i> OAuth</a></h1>
	<a href="search/OAuth"><i class="icon-search"></i> this site: OAuth</a>
	<article>
		<h1><span>OAuth</span></h1>
		<img src="{{asset('assets/img/oauth.png')}}" onerror="imgError(this);" alt="OAuth">
		<a href="http://www.socialphy.com/posts/computers-technology/12978/OAuth.html"></a>
		<p>OAuth allows one to acecss multiple applications.</p>
		<blockquote>Logging into another site with your Google, Twitter, or Facebook account isn't just convenient; it's more secure than creating a new account, or entering your Google, Twitter, or Facebook password into a third-party site. That's where OAuth comes in. Here's how it works, and how it keeps your passwords safe on third-party sites.
		</blockquote>
	</article>
</section>
<section id="git">
	<h1><a href="#git"><i class="icon-link"></i> git</a></h1>
	<a href="search/git"><i class="icon-search"></i> this site: git</a>
	<p>git</p>
</section>
<section id="bootstrap">
	<h1><a href="#bootstrap"><i class="icon-link"></i> bootstrap</a></h1>
	<a href="search/bootstrap"><i class="icon-search"></i> this site: bootstrap</a>
	<p>search the bootstrap docs: POSSIBLY BROKEN</p>

<script>
  (function() {
    var cx = '012277204628171564007:utf36j9aire';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>

</section>


<section id="laravel">
	<div class="kilo delta">
		<!-- ////////////////////////////////////// -->
		      			<a href="http://laravel.com">

		      			<img src="{{asset('assets/img/laravel-l-slant.png')}}" alt="laravel rocks">
		      			<!-- <img src="{{asset('assets/img/einstein.png')}}" alt="laravel rocks"> -->
						<h4>
							<span>Laravel</span>
						</h4>
						</a>
						<h2>PHP Framework</h2>
						<p>Laravel is a framework for PHP.  
							
							  I think of a framework as doing for programming what an assembly
							   line does for manufacturing.
							     A framework has tons of functionality built into it.  It makes for
							     more correct solutions to given probelm. Think: "standardization of parts."</p>
						
						<h5>A Few Features</h5>
						<ul>
							<li>Eloquent ORM</li>
							<li>Artisan CLI</li>
							<li>Polymorphic Relations</li>
							<li>Eager Loading</li>
							<li><a href="http://vschart.com/compare/laravel/vs/ruby-on-rails">Laravel vs. Rails</a></li>
							<li><a href="http://laravel.com/docs/requests#old-input">Old Input</a>
</li>
						</ul>
						<!-- <p>The best thing since sliced bread.</p> -->

						<h5>Some Fancy links</h5>
						<ul>
							<li><a href="http://laravel.io/">Laravel IO</a></li>
							<li><a href="http://reviewtechgame.blogspot.com/2013/04/laravel-4-elegant-php-framework-for-web.html">Recent Review of Laravel</a>
						</li>
						</ul>
						
						<h3>Search Laravel Docs:</h3>
		<script>
		  (function() {
		    var cx = '012277204628171564007:sik_hha9myk';
		    var gcse = document.createElement('script');
		    gcse.type = 'text/javascript';
		    gcse.async = true;
		    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		        '//www.google.com/cse/cse.js?cx=' + cx;
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(gcse, s);
		  })();
		</script>
		<gcse:search></gcse:search>

<!-- ///////////////////////////////////////// -->
	</div>
</section>

<section id="oauth">

</section>
<section id="git">
	<em>git</em>
</section>
<section id="bootstrap">

	<a href="http://www.bootstrapcdn.com/">http://www.bootstrapcdn.com/</a>
</section>



<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>


<div class="kilo delta col-lg-6">
	
	<h1>h1</h1>
	<h2>h2</h2>
	<h3>h3</h3>	
	<h4>h4</h4>
	<h4><span>h4span</span></h4>
	<h5>h5</h5>
	<h6>h6</h6>
	<p>p</p>
	<p><span>pspan</span></p>
	
	<img src="holder.js/300x300" alt="HOLDER" class="img-circle">
	<h2>kilo delta</h2>

    <div class="shape" id="shape1">1</div>
    <div class="shape" id="shape2">2</div>
    <div class="shape" id="shape3">3</div>

</div>



<div class="row">
	<div class="col-lg-4">
		<div class="thumbnail" id="jquery">
			<img src="{{asset('assets/img/large_jquery_logo.png')}}" alt="jquery">
			<article>
				<h1>JQuery</h1>
					<a href="http://www.codecademy.com/tracks/jquery">Codacademy jquery tutorials</a>
					<p>The Javascript Framework</p>

			</article>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="thumbnail" id="ebay">
			<article>
				<img src="{{asset('assets/img/ebay.jpg')}}" alt="Ebay">
				<h4>EBay</h4>
				<a href="http://developer.ebay.com/common/api/">
					
				</a>
				<p></p>
			</article>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="thumbnail" id="oauth">
			
		</div>
	</div>

http://piwik.org/docs/analytics-api/

</div>
<!-- row -->

<hr>
    <form id="custom-search-form" class="form-search form-horizontal pull-right">
    <div class="input-append span12">
    <input type="text" class="search-query" placeholder="Search">
    <button type="submit" class="btn"><i class="icon-search"></i></button>
    </div>
    </form>
<hr>




<pre>
Tango Icons
------------
In the preparation of the 0.8.90 release Novell took care of tracking
down all the contributors to get them to relicense their artwork
into Public Domain.

The COPYING file of the tarball states the following:
| The icons in this repository are herefore released into the Public Domain.

Additionally the copyright status of the files was tracked in the CVS and the rdf properties of the SVGs adjusted for all files that were put into Public Domain (see rdf:about and rdf:resource).  Both fields contain a link to the Creative Commons Public Domain Dediciation[0] as reproduced below:
</pre>


<div class= "thumbnail delta">
	<h3>Mysql</h3>
	<a href="http://www.thegeekstuff.com/2008/09/backup-and-restore-mysql-database-using-mysqldump/"><h4><span>Backup and Restore</span></h4></a>
	onerror="imgError(this);

<pre class="prettyprint">
	<code class="lang-php">

	</code>
</pre>
<?php
$code='<code>';
?>
	<p>
		{{{$code}}}
		<code>
		    gristech@serv01 [~/myapp]# mysqldump -u gristech --all > ~/sqldump/dump.sql 
		</code>
		{{{"</code>"}}}

	</p>


	<p>
		{{e('<pre>')}}
		<pre class="prettyprint">
		    gristech@serv01 [~/myapp]# mysqldump -u gristech --all > ~/sqldump/dump.sql 
		</pre>
		{{e('</code>')}}
	</p>


	<p>The difference between code and pre tags.</p>
	<p>It is also a good example of google prettify.</p>
</div>

<pre>
	{{e('foobar')}}
</pre>


<div class="">
	<a href="http://www.cssdrive.com/imagepalette/index.php">Convert Image to Color Pallete</a>
<img src="{{asset('assets/img/myapp.png')}}" alt="">
</div>

<div class="row-fluid">
	<div class="span6">
		<h2>The right tool for the job...</h2>
		<p class="HL">There are many things that might be </p>
		<ul>
			<li>Web Application Development</li>
			<li>Web Design</li>
		</ul>
			
		</p>
		<p>
			Every carpenter knows that there is nothing more time-saving than using the 
			right tool for the job.  It's faster, and your project turns out to be of better-quality,
			as compared to endless workarounds, trying to make a given tool do something it wasn't built to do.
			<!-- A web developer, web designer -->
		</p>
		<p>Each tool builds upon another: The collective end-product is the result of tens of thousands of hours of community effort.</p>

		<p>There are 2 types of workers:</p>
		<ol>
			<li>Web Designers</li>
			<li>Web Developers</li>
		</ol>
		<p>Designers work on the front end with, well, the design of a site.  
			Their tools include Javascript, CSS, HTML, and other content-related things.  
			The primary concern for the designer is the View.</p>
		<p>Developers work with the innards: the back-end code, so to speak.  The main 
			concern is the <em>architechture</em> of the application.  Their tools include PHP, Frameworks, and Databases.
			Designers work in code: Controllers, Models, and an assembly of other tools.
		</p>
	</div>
		<div class="span3 triangle-obtuse">
		<p>Lorem ipsum <div class="HL">This is class=\"HL\"</div><a href="http://nicolasgallagher.com/pure-css-speech-bubbles/demo/">Speech Bubble</a></p>
		

	</div>
	<div class="span2 oval-thought-border">This bubble is entirely CSS.</div>
	<div class="span3 thumbnail">
		<img src="{{asset('assets/img/thinker/thinker.png')}}" alt="think about it">

		
	</div>


</div>


<div class="row-fluid">

	      		<!-- http://davidwalsh.name/css-circles -->

				<div class="span10">
					<div class= "thumbnail delta">
		      			<a href="http://OAuth2.0">
		      			<img src="{{asset('assets/img/oauth.png')}}" alt="">
						<h5><span>OAuth</span></h5>
						</a>
						<h6>Security</h6>
						<p>Supported by many APIs</p>
		      		</div>
					

		      		<div class= "thumbnail delta">
		      			<a href="http://twitter.github.io/bootstrap/scaffolding.html#responsive">
		      			<img src="{{asset('assets/img/logo/twitter-bootstrap.jpg')}}" alt="laravel rocks">
						<h5><span>Bootstrap</span></h5>
						</a>
						<h6>Front-End Framework (Light, Responsive CSS & Javascript)</h6>
						<p>Allows rapid development</p>
		      		</div>



		      		<div class="span3 thumbnail delta">
		      			<a href="http://www.shamusyoung.com/twentysidedtale/?p=18309">
		      			<img src="{{asset('assets/img/penguins.jpg')}}" alt="linux">
						<h4><span>Linux</span></h4>
						</a>
						<p class="photocredit"><a href="http://www.flickr.com/photos/linpadgham/2589167851/">photo &copy; flickr</a></p>
						<h6>It's what runs the internet.</h6>
						<p>The best thing since sliced bread.</p>
		      		</div>

		      		<div class="span3 thumbnail delta">
		      			<a href="http://opensource.org/">
		      			<img src="{{asset('assets/img/logo/osi_standard_logo.png')}}" alt="open source">
						<h4><span>Open Source</span></h4>
						</a>
						<p class="photocredit"><a href="http://opensource.org/">logo &copy; opensource.org</a></p>
						<h6>Free (as in freedom)</h6>
						<h6>Free (as in free beer)</h6>
						<h6><a href="http://opensource.org/licenses/MIT">MIT License</a></h6>
						<p>The best thing since sliced bread.</p>
						<p>Read about <a href="{{{ URL::to('security') }}}">Security</a> </p>
		      		</div>

		      		<div class="span3 thumbnail delta">
		      			<a href="http://lorempixum.com/">
		      			<img src="http://lorempixum.com/g/350/200/city" alt="lorempixum">
						<h4><span>Free Images</span></h4>
						</a>
						<h6>Awesome</h6>
						<p>The best thing since sliced bread.</p>
						<ul>
							<li><a href="http://clipartist.info/RSS/openclipart.org/2011/May/29-Sunday/lawn_mower.svg.html">Open Clip Art Library</a>
							</li>
							<li>lorempixum</li>
							<li><a href="http://www.flickr.com/creativecommons/">flickr</a></li>
							<li><a href="http://www.kozzi.com/?ref=146452">Kozzi</a></li>
							<li><a href="http://www.deviantart.com/"></a>deviantart</li>
							<li><a href="http://search.creativecommons.org/">Creative Commons</a></li>
							<li><a href="http://pixabay.com/en/rome-italy-fontana-statue-statues-107889/">pixabay</a></li>
							<li><a href="http://yourbusiness.azcentral.com/give-copyright-credit-images-2791.html">About copyrighting</a></li>
							<li><a href="http://www.colorpicker.com/">ColorPicker</a></li>
							<li><a href="http://thenounproject.com/">THe Noun Project</a></li>
							<li><a href="http://colorschemedesigner.com/#4r42Ew0w0w0w0">Color Scheme Designer</a></li>
						</ul>

						<!-- http://yourbusiness.azcentral.com/give-copyright-credit-images-2791.html -->
		      		</div>



		      		<div class= "thumbnail delta">
		      			<a href="http://www.sublimetext.com/">
		      			<img src="{{asset('assets/img/screen/sublime.png')}}" alt="Sublime Text">
						<h4><span>Sublime Text</span></h4>
						</a>
						<h6>Text Editor/IDE</h6>
						<a href="http://www.chromium.org/developers/sublime-text">http://www.chromium.org/developers/sublime-text</a>
						<p>You can use it for free for a while, but DBAD.</p>
						<h5>$70</h5>
						<p>You also need the <a href="http://wbond.net/sublime_packages/sftp">SFTP Plugin for Sublime.</a> $16.</p>

		      		</div>

		      		<div class= "thumbnail delta" id="facebook">
		      			<a href="https://developers.facebook.com/docs/web/">
		      			<img src="{{asset('assets/img/screen/facebook.png')}}" alt="facebook" onerror="imgError(this);">

						<h4><span>Facebook</span></h4>
						</a>
						<h6>The Social Network</h6>
						<p>Like it!.</p>
						<h5>$free</h5>
						<!-- <p>You also need <a href="http://wbond.net/sublime_packages/sftp">SFTP</a> $16.</p> -->

		      		</div>



		      		<div class= "thumbnail delta">
		      			<a href="http://www.inkscape.com/">
		      			<img src="{{asset('assets/img/screen/inkscape.png')}}" alt="Inkscape">
						<h4><span>Inkscape</span></h4>
						</a>
						<h6>Vector Images</h6>
						<p>The best thing since sliced bread.</p>
						<ul>
							<li><a href="http://inkscapetutorials.wordpress.com/">tutorials</a></li>
							<li><a href="">Download</a></li>
						</ul>
		      		</div>

		      		<div class= "thumbnail delta">
		      			<a href="http://fortawesome.github.io/Font-Awesome/">
		      			<img src="{{asset('assets/img/screen/font-awesome.png')}}" alt="Font-Awesome">
						<!-- <h4><span><i class="icon-font-awesome"></i>Font Awesome</span></h4> -->
						</a>
						<h6>It's Awesome (seriously!)</h6>
						<p>Version 3.2.0 - 6/13/2013</p>
						<ul>
							<li><i class="icon-beer"></i> Free! <a href="http://opensource.org/licenses/mit-license.html"> MIT License</a></li>
						</ul>
						<i class="icon-android"></i>
						<i class="icon-thumbs-up"></i>
						<i class="icon-file"></i>
						<i class="icon-comments-alt"></i>
						<p>The best thing since sliced bread.</p>
		      		</div>
					

		      		<div class= "thumbnail delta">
		      			<a href="http://javascript.com/">
		    <img src="{{asset('assets/img/js.png')}}" alt="Javascript">
						<h4><span><i class="icon-arrow-right"></i>Javascript</span></h4>
						</a>
						<h6>About Javascript:</h6>
<!-- 						<ul>
							<li><a href="http://opensource.org/licenses/mit-license.html"><i class="icon-beer"></i> Free: MIT License</a></li>
						</ul> -->
						<p>
							It's not Java, and it's not scripting: it's object oriented resource management.
							It's fully decoupled, modular system of many bits of heavily tested code.</p>

							
		      		</div>

		      		<div class= "thumbnail delta">
		      			<a href="http://bootswatch.com/">
		      			<img src="{{asset('assets/img/screen/bootswatch.png')}}" alt="Bootswatch">
						<h4><span></i>Bootswatch</span></h4>
						</a>
						<h6>It's Awesome</h6>
<!-- 						<ul>
							<li><a href="http://opensource.org/licenses/mit-license.html"><i class="icon-beer"></i>Free: MIT License</a></li>
						</ul> -->
						<p>The best thing since sliced bread.</p>
		      		</div>

		      		<div class= "thumbnail delta">
		      			<a href="http://google.com/docs">
		      			<a href=""></a>

		      			<img src="{{asset('assets/img/screen/googledocs.png')}}" alt="Google Docs">
						<h4><span><i class="icon-file"></i>Google-Docs</span></h4>
						</a>
						<h6>It's Awesome</h6>
<!-- 						<ul>
							<li><a href="http://opensource.org/licenses/mit-license.html"><i class="icon-beer"></i>Free: MIT License</a></li>
						</ul> -->
						<p>$5 per user per month</p>
		      		</div>
				</div>

				
				<!-- ./ span10 -->

				<!-- sidebar -->

	




					  
					<!-- Black and White -->  
					<!-- <img src="http://www.lorempixum.com/g/400/100" alt="" />   -->
					  
					<!-- Tagged -->  
					<!-- <img src="http://www.lorempixum.com/g/400/100/nature" alt="" /> -->
		</div>

<div class="span12">
	<h3>some great things about Laravel</h3>
	<ul>
		<li>artisan</li>
		<li>Eloquent</li>
		<li>swiftmailer</li>
		<li>symfony components</li>
	</ul>
</div>

<div>
	<ul>
		<li>
			<a href="https://sites.google.com/a/webpagetest.org/docs/other-resources/optimization-resources">Webpage Speed Optimization</a>
		</li>
	</ul>
</div>

<div class="kilo delta">


						<!-- Default -->  
	<!-- <div class="delta"> -->
	<img src="http://lorempixum.com/1680/1250/nature" alt="" />  
<!-- </div>				 -->
<h1><span>The New Colossus</span></h1>

<p><span>A random nature image</span></p>

</div>

<div>
	<p>
		By the way, this page is an example of a fluid grid system

	</p>
	<blockquote>"I would never use beta code in a production environment."</blockquote>
								Facebook and Google do.  Both publish always-beta code.  The difference between beta and production is just terminology.  I'd rather think about how to make it easier to maintain or change.

								This is where unit testing comes in.  I need to get phpunit up and running: I have recently had difficulty doing so.

	Frankly I think it feels sort of arrogant to declare that the project is stable and complete.

								  <blockquote>
								  	That may be fine for small projects, but the rule should not apply to large, complex projects.
								  </blockquote>
								  Rolling out a major release is one thing, but what better testing is there than real-world use?

								  Composer manages dependencies, take care of dependancies.  Git takes care of version control.  Sublime SFTP automatically uploads over SFTP."
</div>

<div class="span2 pull-right text-center foxtrot">
	<!-- <a href="http://http://www.siteground.com/"> -->

<h3>Siteground</h3>
</a>
<h6>Webhost</h6>
<p>My webhost has always been fantastic.  If I have a problem, They are instantly available via webchat, 24-7.  Great Service is always the key to good business!</p>
	
	<div class="text-center">
	<a href="http://www.siteground.com" onClick="this.href='http://www.siteground.com/index.htm?afbannercode=090922b4e36a794ded5eb252b703ad39'" ><img  src="https://ua.siteground.com/img/banners/general/blue/120x600.gif" alt="Web Hosting" width="120" height="600" border="0"></a>
	</div>
</div>

		
@stop