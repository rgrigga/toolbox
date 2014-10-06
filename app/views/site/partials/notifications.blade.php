
<!--<h1>Notifications:</h1>-->
@if ($errors->any())
<div class="alert">
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif

@if(Session::get('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
<?php Session::forget('message'); ?>
@endif

@if(Session::get('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

@if(Session::get('warning'))
<div class="alert alert-warning">{{Session::get('warning')}}</div>
@endif

@if(Session::get('danger'))
<div class="alert alert-danger">Error: {{Session::get('danger')}}</div>
@endif
@if(Session::get('error'))
<div class="alert alert-danger">Error: {{Session::get('error')}}</div>
@endif