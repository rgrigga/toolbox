@extends('layouts.master')
<!-- @ extends('site.layouts.default') -->
{{-- Web site Title --}}
@section('title')
@parent
{{{ "Search" }}}
@stop

{{-- Content --}}
@section('main')

{{$searchbox}}
<p>You can use % as a wildcard.</p>
<h1>{{{$heading}}}</h1>
Search Tags? <a href='/tags/{{ $tag }}'>{{$tag}}</a>
<!-- <p>This page should search for...</p>
<h2>Pages, Posts, Tags</h2>
<h3>Page Content Word Search:</h3>
<h3>Post Content Word Search:</h3> -->

<p>Searched for: "{{$tag}}"</p>
<ul>
    <li>
        Wordcount: {{$wordcount}}
    </li>
    <li>
        Posts: {{$postcount}}
    </li>
    <li>
        Pages: {{$pagecount}}
    </li>
</ul>

<div class="well">
    <p class="muted">Results:</p>
    {{$results}}
</div>



@stop


@section('admin-bottom')

<h6>Search for content word frequency:</h6>

<a href="http://stackoverflow.com/questions/2984786/php-sort-and-count-instances-of-words-in-a-given-string">Per Stack Overflow</a>

<pre class="prettyprint">
$str = 'happy beautiful happy lines pear gin happy lines rock happy lines pear ';
$words = array_count_values(str_word_count($str, 1));
arsort($words);
print_r($words);
</pre>

<p>This is a collection of search engine tools.</p>

<h2>Google Custom Search</h2>

<gcse:search></gcse:search>

<ul>
    <li>
        <a href="http://www.google.com/cse/create/getcode?cx=012277204628171564007%3Awxynsgsirww">http://www.google.com/cse/create/getcode?cx=012277204628171564007%3Awxynsgsirww</a>
    </li>
    <li>
        <a href="https://developers.google.com/custom-search/docs/element">https://developers.google.com/custom-search/docs/element</a>
    </li>
</ul>

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>

<pre class="prettyprint"><code>
  (function() {
    var cx = '012277204628171564007:wxynsgsirww';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</code></pre>

<script>
  (function() {
    var cx = '012277204628171564007:wxynsgsirww';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>



<p><a href="http://www.wired.com/wiredenterprise/2012/12/solar-elasticsearch-google/2/">open source alternatives to google</a>  That led to these:</p>
<ul>
    <li>
        <a href="http://www.elasticsearch.org/overview/">ElasticSearch</a>
    </li>
    <li>
        <a href="http://lucene.apache.org/solr/">Solr</a>
    </li>
</ul>

<div>One day: <a href="http://searchengineland.com/oh-good-grep-web-grepper-a-new-web-intelligence-feature-from-blekko-92730">Grep this site, or any site for that matter.  Think about that for a moment. I think it's exciting!</a></div>

        <div class="row-fluid">
            <div class="span4">
                <div id="search_engine-US-monthly-201307-201307-bar" width="600" height="400" style="width:600px; height: 400px;"></div><!-- You may change the values of width and height above to resize the chart -->
                <p>Source: <a href="http://gs.statcounter.com/#search_engine-US-monthly-201307-201307-bar">StatCounter Global Stats - Search Engine Market Share</a></p>
                <script type="text/javascript" src="http://www.statcounter.com/js/FusionCharts.js"></script>
                <script type="text/javascript" src="http://gs.statcounter.com/chart.php?search_engine-US-monthly-201307-201307-bar"></script>
            </div>
        </div>

@stop