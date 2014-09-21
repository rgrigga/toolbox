@extends('layouts.master')

@section('page-header')
<h1>Login</h1>
<div class="alert">
    {{$error or "no errors"}}
    {{$errors->first()}}

    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif

    <h1>{{Session::get('mydata');}}</h1>

</div>


@stop

<div class="row">
    @section('content')
    <section id="loginform">
        <div class="formwrap">
            {{$loginform}}
        </div>
    </section>
    <section class="codesample">
        <code>section:codesample</code>
        <p>Here is some live code being used to generate this page:</p>
        <?php
        $path="/assets/less/login.less";
        $githubpath="https://github.com/rgrigga/toolbox/blob/master/public".$path;
        ?>
        <?php $url = URL::to($path) ?>
        <h5>from <code>login.less</code>: <a href="{{URL::to($url)}}">view source</a> | <a href="{{$githubpath}}">view github</a></h5>

        <pre><code><?= htmlentities(file_get_contents(base_path()."/public".$path)); ?></code></pre>
        <!--    <pre><code>--><?//= htmlentities($eot); ?><!--</code></pre>-->
    </section>

    @stop


    @section('sidebar')

    @parent
    <h5>Sidebar:</h5>
    <p class="bg-primary">In Other News: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, deserunt.</p>

    @stop
    @section('secondary')
    <div class="secondary">
        <div class="well">
            <h4>Don't have a login yet?</h4>
            <p class="text-center">
                <?= link_to_route('signup','Create User',[],['class'=>'btn btn-primary']) ?>
            </p>
            <p>email confirmation is currently disabled, so you can pretty much just click the button, save your desired credentials, and you'll then be able to access the entire system.</p>
        </div>

    </div>
    @parent
    @stop
</div>


@section('footer')
{{$companyinfo}}
@stop

@section('sidebar-left')

@overwrite