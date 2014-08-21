<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<link rel="stylesheet" href="{{asset('assets/css/demostyles.css')}}">
		<script type="text/javascript" src={{asset('assets/js/jquery.v1.8.3.min.js')}}></script>
		<script type="text/javascript" src={{asset('assets/js/demo.js')}}></script>
		<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?&skin=sunburst"></script>
	</head>
	<body>

<h1>JS</h1>
<p>let's try some javascript:</p>
<p>For a good time, edit 'assets/js/demo.js'</p>


<h1>Loops</h1>

<h2>For</h2>
<pre><code>
	for(x=1;x<=10;x++){
		console.log(x);
	}

</code></pre>

<h2>While</h2>
<pre><code>
	while (condition is true){
		//loop code
	}

</code></pre>
example:
<pre><code>
	var userInput=0;
	while (userInput != 99){
		userInput=prompt("enter a number, 99 to exit","99");
		console.log(userInput);
	}

</code></pre>
<h2>Do...While</h2>
<pre><code>
	do{
		userInput=prompt('enter a number, 99 to exit','99');
		console.log(userInput);
	}	
	while (	userInput!=99);

</code></pre>

		<section class="input">
			<form action="#">
			<input type="text" class="text">
			<input type="submit" class="submit" id="mysubmit">		
			</form>

		</section>
		<div class="results" id="results">
			
		</div>
<script>
$('#mysubmit').click(function(){
	console.log("hello world");
});
</script>
	</body>
</html>