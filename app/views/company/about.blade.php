
<div class="about" id="about" name="about">
	<h1>{{{$company->name}}}</h1>

<img class="logo img-responsive" src="{{{asset('assets/'.strtolower($company->brand).'/'.$company->image)}}}" alt="logo">
	
	<h2>{{{$company->slogan}}}</h2>
	<p>{{$company->description}}</p>
	<!-- <h3>Company Asset Directory:  -->
		{{--{$company->directory()}--}}
	<!-- </h3> -->
	<a class="btn btn-large" href="tel:{{{preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $company->phone)}}}"><h2>{{{preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $company->phone)}}}</h2></a>

	@if(Auth::user('admin'))
<!-- http://stackoverflow.com/questions/5872096/function-to-add-dashes-to-us-phone-number-in-php -->
	<p>
		<a class="btn btn-danger" href="/companies/{{{$company->id}}}/edit">edit</a>
	</p>
	@endif





</div>
