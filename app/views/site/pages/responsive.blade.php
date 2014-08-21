@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ "Responsive" }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

<h1>Responsive Design?</h1>
<abbr title="Looks great on any size device" class="initialism">Responsive</abbr>
<p>What the heck is responsive design?</p>




<div class="hero-unit">

	<div class="row-fluid">
		<div class="span6">
			<h2>5 Screen Sizes</h2>
			<img src="{{asset('assets/img/mobile/responsive3.jpg')}}" alt="">
		</div>
		<div class="span6">
	<p>It basically boils down to 3 different main categories, but there are 5 sizes of screens.  

	</p>
	<ul class="unstyled">
	
		<li>
			<h3>Desktop</h3>
			<ul>
				<li>Large Desktop, (or Big-Screen TV)</li>
			</ul>
		</li>
		<li>
			<h3>Tablet</h3>
			<ul>
				<li>Tablet-Portrait</li>
				<li>Tablet-Landscape</li>
			</ul>
		</li>
		<li>
			<h3>Mobile</h3>
			<ul>
				<li>Mobile-Portrait</li>
				<li>Mobile-Landscape</li>
			</ul>	
		</li>
	</ul>
		</div>
		<!-- span -->
	</div>
	<!-- row -->
</div>
<!-- hero -->

<div class="row-fluid">
	<div class="span6 offset2">
		<p>
			Let's take a closer look at how the <a href="http://twitter.github.io/bootstrap/scaffolding.html#responsive">bootstrap</a> system (v.2.3.2) handles this...
		</p>
<table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Label</th>
                <th>Layout width</th>
                <th>Column width</th>
                <th>Gutter width</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Large display</td>
                <td>1200px and up</td>
                <td>70px</td>
                <td>30px</td>
              </tr>
              <tr>
                <td>Default</td>
                <td>980px and up</td>
                <td>60px</td>
                <td>20px</td>
              </tr>
              <tr>
                <td>Portrait tablets</td>
                <td>768px and above</td>
                <td>42px</td>
                <td>20px</td>
              </tr>
              <tr>
                <td>Phones to tablets</td>
                <td>767px and below</td>
                <td class="muted" colspan="2">Fluid columns, no fixed widths</td>
              </tr>
              <tr>
                <td>Phones</td>
                <td>480px and below</td>
                <td class="muted" colspan="2">Fluid columns, no fixed widths</td>
              </tr>
            </tbody>
          </table>


	</div>
</div>

<div class="hero-unit">

<img class="pull-right" src="{{asset('assets/img/mobile/responsive4.png')}}" alt="">
<p></p>
<p>

	Woulnd't it be easier to design, maintain, edit, add-to, extend, and talk about one codebase rather than 3? (duh.)
</p>
<p>
	The old way is insane: It's expensive for the client, and tedious for the developer.
</p>


</div>

<p>This site is meant to be viewed on any device <strong>without changing the content</strong>.  In other words, all the content appears on the mobile site, too, and it should look pretty good.</p>
<p>It doesn't have to be complicated.</p>

<!-- Here is a very old example of a website from 1994 that looks just fine on any screen size: <a href="http://www.pixelscapes.com/spatulacity/button.htm">The Button</a>. -->

@stop
