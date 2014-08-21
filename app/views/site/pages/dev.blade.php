@extends('layouts.scaffold')

@section('nav')
@include('site.partials.nav-top-min')
@stop

@section('admin-top')
<!-- @ include('admin.nav') -->
@stop
@section('main')

{{--View::make('site/gristech/md5')->with($tag);--}}



<!-- <iframe src="" frameborder="0"></iframe> -->


<?php
$str=<<<'EOT'
<?php
function kindasafe(\$password,$n){
  for($i=1;$i<$n;$i++){
    $password = md5($password);
    echo "<h2>$password</h2>";
  }
}
kindasafe($q,10);
?>
EOT;
?>
<pre><code><?=e($str)?></code></pre>

<p>The legacy code was written to php 5.2ish, and was object oriented whenever possible.  I did not use a framework.  I created my own framework.  What it lacks in tradition, I beleive it makes up for in foresight for reusability.</p>
<p>You see, I did not know what MVC was.  I read about "n-tier architecture" and tried to implement that concept into my code.  </p>

<p>Design Patterns</p>
<ul>
	<li>One of my favorite books, <a href="http://www.amazon.com/Objects-Patterns-Practice-Experts-Source/dp/143022925X/ref=pd_sim_b_2/179-9897814-3268241">PHP Objects, Patterns and Practice</a></li>
	<li>
		<a href="http://www.fluffycat.com/PHP-Design-Patterns/">Fluffycat</a>
	</li>
	<li>
		<a href="http://net.tutsplus.com/tutorials/php/the-whens-and-whys-for-php-design-patterns/">Net tuts</a>
	</li>
</ul>
<p></p>


<p>Some more links:</p>
<ul>
	<li><a href="http://en.rian.ru/infographics/20121028/176939715.html">Infographic</a></li>
	<li><a href="http://thechangelog.com/whoa-sublime-web-inspector/">Sublime</a></li>
	<li><a href="http://laravel.com/api/source-class-Illuminate.Filesystem.Filesystem.html#10-19">Illuminate Filesystem Docs</a></li>
</ul>

<h2>SSH Access</h2>
<p class="lead">...to FTP or the command-line interface can be arranged.</p>
<p>Once you have this set up, here are the commands I use to connect:</p>

<pre class='prettyprint'><code>
~/.ssh$ ssh-add siteground_dsa
~/.ssh$ ssh gristech@siteground252.com -p18765
</code></pre>

<pre class="prettyprint"><code>
ryan@Grisbuntu:~/.ssh$ ssh-add siteground_dsa
Enter passphrase for siteground_dsa: //Your password here
Identity added: siteground_dsa (siteground_dsa)
"ryan@Grisbuntu:~/.ssh$ ssh gristech@siteground252.com -p18765
Last login: Thu Jun 27 05:59:12 2013 from 69.47.54.196
gristech@serv01 [~]# 
</code></pre>

<h3>File Permissions</h3>
<p>File permisisons in the main application are according to 3 primary critera:
<ul>
	<li>Users</li>
	<li>Groups</li>	
	<li>Roles</li>
</ul>
</p>
<p>Group Permissions are not the same as Roles.</p>
<p>"Company" is a very important entity.</p>
<p>So is "User".</p>
<p>Authentication is available via the following methods:
<ol>
	<li><a href="http://laravel.com/docs/security">Laravel's default installation</a></li>
	<li>add-on Package called "Confide"</li>
	<li>Roles are managed by a package called "Entrust"</li>
</ol>
<!--  , an . . hmm... make a php function for this?  Excercise in unit testing? -->
</p>

<p><strong>Users</strong> are individuals.</p>
<p><strong>Groups</strong>are obviously groups.</p>

<p>It is as clear a case of "one" and "many" as any ever was.</p>

<p>Groups can have many Users.  Users can belong to many groups.  Therefore, the releationship between Users and Groups can be called "Many to Many".</p>






<h2>CODE SAMPLES:</h2>
<!-- ol>li*4>pre.prettyprint>code - tab -->
<ol>
	<li>
		<pre class="prettyprint"><code>
interface TypeIF{
    function set_type($type);
    function get_type();
    function get_type_id();
}

interface ColorIF{
    function set_color($color);
    function get_color();
    function get_color_id();
}

interface ActionIF{
    function set_action($action);
    function get_action();
    function get_action_id();
}

interface SizeIF{
    function set_size($size);
    function get_size();
    function get_size_id();
}
		</code></pre>
	</li>
	<li>
		<pre class="prettyprint"><code>

		</code></pre>
	</li>
	<li>
		<pre class="prettyprint"><code></code></pre>
	</li>
	<li>
		<pre class="prettyprint"><code></code></pre>
	</li>
</ol>
<p>It has close to a RESTful API... Most objects have:</p>
<ul>
	<li>get</li>
	<li>set</li>
	<li>show</li>
	<li>fetch</li>
	<li>Some others</li>
</ul>
<h3>Design Patterns Used</h3>
I can demonstrate the use of at least a dozen, maybe more, design patterns, including some fairly advanced stuff like "Memento" - that one was kind of tough.
<ul>
	<li>
		<h4>Example of Inheritance</h4>
		<pre class="prettyprint"><code>
class MaterialCollection extends EstimateItemCollection{
    //item_class.id=1
    protected $taxrate=.0725;
    function get_taxes(){
        return $this->get_total_cost() * $this->taxrate;
    }
}

class LaborCollection extends EstimateItemCollection{
    //item_class.id=2
}

class OtherCollection extends EstimateItemCollection{
    //item_class.id=0
}
		</code></pre>
	</li>
	<li>
		<h4></h4>
		<pre class="prettyprint"><code>
$this->rows[]=InputFactory::build('Quantity',$this->estimateitem->get_quantity());
$this->rows[]=InputFactory::build('Cost',$this->estimateitem->get_cost());
$this->rows[]=SelectBoxFactory::build('item_units',$this->estimateitem->get_unit());
$this->rows[]=SelectBoxFactory::build('markup',$this->estimateitem->get_markup());
//var_dump($this->estimateitem->get_override()).
$this->rows[]=InputFactory::build('Override',$this->estimateitem->get_override(),"checkbox");
		</code></pre>
	</li>
	<li>
		<h4></h4>
		<pre class="prettyprint"><code>



		</code></pre>
	</li>
	<li>
		<h4></h4>
		<pre class="prettyprint"><code>



		</code></pre>
	</li>
</ul>
<h6>out of place</h6>
<p class="muted">The following should be moved to </p>
<section class="idea">
	<h4>Ideas...</h4>
	<p></p>
</section>
<p></p>
@stop