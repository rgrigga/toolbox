@extends('layouts.master')

@section('styles')
@parent
    <link rel="stylesheet/less" type="text/css" href="/assets/css/less/master.less" />

<!-- This display's the company's less page -->
<!--     <link rel="stylesheet/less" type="text/css" href="/assets/css/less/{{--strtolower($company->brand)--}}.less" /> -->

    <script src="/assets/js/less.js" type="text/javascript"></script>
@stop



@section('main')
<h1>Edit Company</h1>

<div class="row">
    <div class="span4">
{{ Form::open(array('method' => 'PATCH', 'route' => array('companies.update', $company->id))) }}

<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

            <ul>
                <li>
                    {{ Form::label('brand', 'Brand:') }}
                    {{-- Form::text('brand') --}}

                    <input type="text" name="brand" id="brand" value="{{{ Input::old('brand', $company->brand) }}}" />
                </li>

                <li>
                    {{ Form::label('name', 'Name:') }}
                    <input type="text" name="name" id="name" value="{{{ Input::old('name', $company->name) }}}" />
                </li>

                <li>
                    10 digits, no dashes, eg 6145551212
                    {{ Form::label('phone', 'Phone:') }}
                    <input type="text" name="phone" id="phone" value="{{{ Input::old('phone', $company->phone) }}}" />
                </li>

                <li>
                    {{ Form::label('email', 'Email:') }}
                    <input type="text" name="email" id="email" value="{{{ Input::old('email', $company->email) }}}" />
                </li>

                <li>
                    {{ Form::label('facebook', 'Facebook:') }}
                    <input type="text" name="facebook" id="facebook" value="{{{ Input::old('facebook', $company->facebook) }}}" />
                </li>

                <li>
                    {{ Form::label('twitter', 'twitter:') }}
                    <input type="text" name="twitter" id="twitter" value="{{{ Input::old('twitter', $company->twitter) }}}" />
                </li>

                <li>
                    {{ Form::label('linkedin', 'linkedin:') }}
                    <input type="text" name="linkedin" id="linkedin" value="{{{ Input::old('linkedin', $company->linkedin) }}}" />
                </li>

                <li>
                    {{ Form::label('description', 'Description:') }}
                    {{ Form::textarea('description',Input::old('description',$company->description),['class'=>'summernote']) }}
                </li>

                <li>
                    {{ Form::label('slogan', 'Slogan:') }}
                    <input type="text" name="slogan" id="slogan" value="{{{ Input::old('slogan', $company->slogan) }}}" />
                </li>

                <li>
                    {{ Form::label('image', 'Image:') }}
                    <input type="text" name="image" id="image" value="{{{ Input::old('image', $company->image) }}}" />
                </li>


                <!-- <li> -->
                    <!-- {{ Form::label('home', 'Home Page:') }} -->
                    <!-- {{ Form::text('home') }} -->
                <!-- </li> -->

                <li>
                    {{ Form::label('menus', 'Menus:') }}
                    <input type="text" name="menus" id="menus" value="{{{ Input::old('menus', $company->menus) }}}" />
                </li>

                <li>
                    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                    {{ link_to_route('companies.show', 'Cancel', $company->id, array('class' => 'btn')) }}
                </li>
            </ul>
        {{ Form::close() }}

        @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
        @endif
    </div>
    <div class="span7 text-center well">
        <h1>PREVIEW:</h1>

        {{--View::make('company.about')--}}

        @if(Auth::user('admin'))
        <!-- <pre><code>View::make('company/about');</code></pre> -->

        @endif

        {{$about}}

<pre class="prettyprint">
View::make('company.about');
\{\{ $about \}\}
</pre>
    </div>
    <!-- span7 -->
</div>
<!-- row -->


@stop