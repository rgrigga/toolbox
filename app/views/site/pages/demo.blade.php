@extends('layouts.demo')
{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site.demo') }}} ::
@parent
@stop

@section('myjs')
<!-- http://stackoverflow.com/questions/11968072/twitter-bootstrap-button-click-to-toggle-expand-collapse-text-section-above-butt -->

@stop

@section('nav')
<!-- Navbar -->
@include('site.partials.nav-top-min')
<!-- // @ include('site.partials.nav-buckeye') -->
@show
{{-- Content --}}
@section('page-header')
    <h1>site.pages.demo</h1>
<p>What you have here is an all-purpose demo page which can be used to throw out some quick n dirty ideas.  Enjoy!</p>
@stop

@section('main')

<style>

.icomoon{

  font-family: 'IcoMoon';
  src: url('/assets/font/icomoon.woff') format('woff'),
       url('/assets/font/icomoon.ttf') format('truetype');

}

html,body{
	background-color: #235d79;
}

.page-header h1{
	text-align: right;
	font-family: serif;
}
/*  li {
    margin: 3px;
    padding: 3px;
    background: #EEEEEE;
  }*/
  .hilight {
    background: yellow;
  }
</style>

<div id="myDiv">
  target
</div>

<div class="icomoon">
    foobar!!!
    <ul>
        <li><i class="icon-home"></i>Home</li>
        <li><i class="icon-chainsaw"></i>Chainsaw</li>
    </ul>
    
</div>

<ul>
  <li><b>Click me!</b></li>
  <li>You can also <b>Click me!</b></li>
</ul>
 
<script>
$( document ).on( "click", function( event ) {
  $( event.target ).closest( "h1" ).toggleClass("hilight");
});
</script>

<section>
    <h1>Example 1</h1>
    <div class="mycontent" id="one">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, reprehenderit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, nesciunt!</p>
    </div>
</section>

<button>Toggle 'em all</button>
<p>Hiya</p>
<p>Such interesting text, eh?</p>
<script>
$("button").click(function () {
$("p").toggle("slow");
});
</script>

<section>
    <h1>Example 2</h1>
    <div class="mycontent" id="two">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, reprehenderit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, nesciunt!</p>
    </div>
</section>

<div class="row">
    <div class="collapse-group">
        <h2>One</h2>
        <p class="collapse" id="one">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
</div>

<div>
    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo">
  simple collapsible
</button>

<div id="demo" class="collapse in">This is a div, not a paragraph</div>

</div>
<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo2">
  simple collapsible
</button>

<div id="demo2" class="collapse in">This is a div, not a paragraph</div>

<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo3">
  simple collapsible
</button>

<div id="demo3" class="collapse in">This is a div, not a paragraph</div>

<div class="row">
    <div class="span4 collapse-group">
        <h2>Two</h2>
        <p class="collapse" id="two">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
        <div class="span4 collapse-group">
        <h2>Heading</h2>
        <p class="collapse">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
        <div class="span4 collapse-group">
        <h2>Heading</h2>
        <p class="collapse">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
</div>

<!-- @ include('site.partials.contact') -->

@stop
@section('secondary')
<?php
  $mypages = array();
  $path="../app/views/site/demo/";

  // die($path);

  foreach (glob($path."*.blade.php") as $filename) {
    // die($filename);
          $filename=str_replace($path, "", $filename);
          $filename=str_replace(".blade.php", "", $filename);
          array_push($mypages,$filename);
      }

?>
<ul class="nav">
  @foreach($mypages as $item)
  <li>
    <button type="button" onclick="loadXMLDoc('/demo/{{$item}}')">AJAX: {{$item}}</button>
  </li>
  <li>
    <a href="{{URL::to('demo/'.$item)}}">{{$item}}</a>
  </li>
  @endforeach
</ul>

<ul class="nav">
  <li>
    <a href="{{URL::to('demo.$item')}}"></a>
  </li>
</ul>
<script>
function loadXMLDoc(input)
{
  var xmlhttp;
  if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    // alert(input);
    }
  else
    {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {

      document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET",input,true);
  xmlhttp.send();
}
</script>
@stop