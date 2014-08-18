@section('content')

<p>This is the home page.</p>
@stop

@section('sidebar')
@if(Auth::check())
<div class="sidebar">
    <code>.sidebar</code>
    {{$profile or ""}}
</div>
@else
<div class="sidebar">
    <code>.sidebar</code>
    <p>You're not logged in</p>
</div>
@endif
@stop
