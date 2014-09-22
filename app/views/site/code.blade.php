@section('content')

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=sunburst"></script>
<div class="container">

<header>
    <h1>My Development Stack</h1>
    <p>I think of development as a <strong>craft</strong>.</p>
    <p>A "Craft" is like an "Art", but art makes us think of things like paintings.  The focus is generally on the aesthetic side of things.  It could be argued that the intent of such aesthetics on the business side is to attract customers and/or otherwise delight users.  There is certainly an artistic aspect to web development (or any development, for that matter).</p>
    <p>Crafts generally require more tools and supplies than arts do: hammers, nails, screwdrivers, sandpaper,... glue, stain...</p>
    <p>Crafts also require <strong>specific knowledge</strong>.  Any kid can splash paint on paper and call it art, but a fine handcrafted piece of heirloom quality furniture can only be made by someone with the very best tools and a good deal of experience and knowhow.</p>
    <p>Development is <strong>hard</strong>.  It's a worthwhile pursuit, though, and it's a great blend of problem-solving, artistic inclination, analytical thinking, and detailed knowledge of a variety of tools and languages.</p>
    <p>Below is a description of the tools I enjoy using today:</p>
</header>
<hr/>

<section id="lamp">
    <h2>LAMP</h2>
    <p class="text-center">"L.A.M.P." stands for Linux, Apache, Mysql, and PHP.</p>
    <p class="text-center">Something needs to serve your webpage, and these 4 things work together to get the job done.</p>
    <article id="php">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/PHP-logo.svg" alt=""/>
            <p class="text">PHP: Hypertext Preprocessor</p>
        </div>
        <div class="article-content">
            <h3>PHP</h3>
            <button class="btn pull-right" data-toggle="collapse" data-target="#phpcode"><i class="fa fa-code"></i> Code</button>
            <div id="phpcode" class="collapse">
                <?php $eot=<<<'EOT'
$email=(Auth::user())? Auth::user()->email : "";
if(empty($email)){
    $email == "foo@bar.com";
}
EOT;
                ?>
                <pre class="prettyprint"><code >{{{$eot}}}</code></pre>
            </div>
            <p>I've been working with php since 2006, and I prefer it's flexibility and ease-of-use.  It's also a very popular language, so there are a large number of resources available to anyone looking to learn.</p>
            <p>Do yourself a favor: check out the <a href="https://line.do/history-of-php/r5q4x1/vertical">history of php</a></p>

        </div>
    </article>

    <article id="apache">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/apache_feather.png" alt=""/>
            <p class="text">Web Server</p>
        </div>
        <div class="article-content">
            <h3>Apache</h3>
            <p>Apache makes your files available to the web.</p>
            <p>I regularly interact with apache configurations, vhosts, and .htaccess files.</p>
            <button class="btn pull-right" data-toggle="collapse" data-target="#apachecode"><i class="fa fa-code"></i> Code</button>
            <div id="apachecode" class="collapse">
                <pre><code>sudo nano /etc/apache2/sites-available/000-default.conf</code></pre>
                <p class="lead">000-default.conf</p>
                <?php $eot=<<<'EOT'
<VirtualHost *:80>
    DocumentRoot /Code/cakephp
    ServerName cake.dev
    RewriteEngine On
    <Directory "/Code/cakephp">
        Options Indexes Includes FollowSymLinks MultiViews
        AllowOverride All
    Require all granted
    </Directory>
</VirtualHost>
EOT;
                ?>
                <pre><code>{{{$eot}}}</code></pre>
            </div>

        </div>
    </article>

    <article id="mysql">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/mysqllogo.png" alt=""/>
            <p class="text">MySql Database</p>
        </div>
        <div class="article-content">
            <button class="btn pull-right" data-toggle="collapse" data-target="#mysqlcode"><i class="fa fa-code"></i> Code</button>

            <h3>MySQL</h3>
            <p>I use phpMyAdmin, the command line, and MysqlWorkbench to work with database.  I regularly work with users, passwords, and related configuration.
                <mark><span id="star" data-container="body" data-toggle="popover" data-title="more thoughts" data-content="I am constantly fascinated and humbled by the depth of computer code. Just when I'm starting to think that I know a little something about this stuff, I soon remember that I actually know next to nothing compared to those who came before me.">I know a fair bit *</span></mark> about
                SQL and database optimization.  I use php's PDO extension, but I am also familiar with mysqli.
            </p>

            <div id="mysqlcode" class="collapse">
                <p class="lead">Back it up:</p>
                <pre><code>mysqldump -uryan -pPa$$w)rd myapp_prod > ~/sql/dump.sql</code></pre>
                <p class="lead">Restore it:</p>
                <pre><code>mysql -uryan -pPa$$w)rd myapp_dev < ~/sql/dump.sql</code></pre>
            </div>
            <script>
                $('#star').popover({
                    trigger: 'hover',
                    html: true,
                    placement: 'bottom'
                });
            </script>
        </div>
    </article>

    <article id="ubuntu">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/black_orange-hex.svg" alt=""/>
            <p class="text">Ubuntu PC Operating System</p>
            <p class="text"><a href="http://www.ubuntu.com/">www.ubuntu.com</a></p>

        </div>
        <div class="article-content">
            <button class="btn pull-right" data-toggle="collapse" data-target="#ubuntucode"><i class="fa fa-chevron-circle-down "></i> More about OS's</button>

            <h3>Ubuntu</h3>
            <p>"To use Ubuntu is to fall in love with it."</p>
            <p>Bottom line: it's awesome.</p>
            <p>I've been using Ubuntu since ~v 9.04, and once I figured a few things out, I've never looked back.</p>
            <div id="ubuntucode" class="collapse">
                <aside id="opsystems">
                    <article>
                        <h4>Linux</h4>
                        <img class="img-responsive myimg" src="assets/img/Tux-Shirt.svg.png" alt=""/>
                        <p>It has been said that linux has a steeper learning curve, but I recently had my 10-year old son install Ubunutu on 3 different computers, and the kids love it.  It's simple: it's compact, stable, safe... no viruses to worry about, and all our home PC's boot fast and play well together.</p>
                        <p>Not to mention that most of the internet runs on Linux, so why not learn it?</p>
                    </article>
                    <article>
                        <h4>Mac</h4>
                        <img class="img-responsive myimg" src="assets/img/Apple_logo_black.svg" alt=""/>
                        <p>My first computer was an apple IIc, and I used powermacs and iMacs all the way through grade school, high school, and college.  I have not used a mac lately, but I hear they're very user-friendly.</p>
                        <p>The other thing that bothers me about mac is that I can't hack on the hardware.  I have old machines lying around that I use as fileservers and experiments, but macs are 100% disposable.</p>
                    </article>
                    <article>
                        <h4>Windows</h4>
                        <img class="img-responsive myimg" src="assets/img/Eski-Windows-6.png" alt=""/>
                        <p>I own several, and have used many Windows PC's, but I do not get warm fuzzies when I think about the "Microsoft Addiction", specifically in regards to business licensing.  I have massive respect for Bill Gates and co., but I disagree with some of their strategies and tactics.</p>
                        <p>The best argument for me to keep windows around is that most PC users of the applications I build are going to be on windows machines.  Therefore, I can still boot into Windows 7 Pro or XP anytime I like.</p>
                        <p>I have considerable prior experience with Microsoft Office, including VBA, Excel, Word, Access, and PowerPoint</p>
                    </article>
                </aside>
            </div>

            <p class="small">I currently use Ubuntu 12.04 and 14.04 LTS.  Using Clonezilla, I made a live USB of my machine, and now I can migrate to any other PC in about 10 minutes.  A quick <code>vagrant up</code> and we're pretty much back in business.</p>
        </div>
    </article>
</section>

<section id="beyond">
    <h2>Beyond Lamp</h2>
    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/vagrant_header_background2.png" alt=""/>
            <p class="text">Development Environments Made Easy</p>
        </div>
        <div class="article-content">
            <h3>Vagrant</h3>
            <a class="btn btn-info pull-right" href="https://bitbucket.org/rgrissinger/vagrantserver"><i class="fa fa-bitbucket fa-2x"></i> rgrissinger/vagrantserver</a>
            <p class="lead">Please fork my project: </p>
            <p>This is a central VM that hosts all the webserver and database needs for all of my projects.</p>
            <p>All you need are vagrant, virtualbox, and a local <code>~/.ssh/id_rsa</code>. Assuming that, the VM should work on any host OS (32 or 64-bit, Windows, Mac, or Linux).  No matter what machine I or my colleagues work on, we can all work from the same environment.</p>
            <p>I have 5 projects running, but between my desktop, my laptop, my manager, the staging server, and the production server, we have 5 environments to maintain.</p>
            <p>Using Vagrant is not without it's challenges, but it has done wonders for our team's collaboration, and the portability of my entire workflow.</p>
            <p>The concept was inspired by Laravel's Homestead project.  Homestead is configured to use nginx, and some other things that I don't need, and after trying to make it work for a while, I discovered that my 32-bit laptop would not run it.  So, I wrote my own solution.</p>


<pre><code>vagrant up
        vagrant ssh
        cd /Code/myproject
        composer update
        php artisan migrate</code></pre>
        </div>
    </article>


    <h2>Daily Tools</h2>
    <article id="git">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/Git-Logo-2Color.png" alt=""/>
            <p class="text">Version Control</p>
        </div>
        <div class="article-content">
            <h3>git</h3>
            <button class="btn pull-right" data-toggle="collapse" data-target="#gitcode"><i class="fa fa-code"></i> Code</button>

            <p>here are a few good resources for git:</p>
            <ul>
                <li><a href="http://gitref.org/">http://gitref.org/</a></li>
                <li><a href="http://git-scm.com/docs">http://git-scm.com/docs</a></li>
                <li><a href="http://marklodato.github.io/visual-git-guide/index-en.html">http://marklodato.github.io/visual-git-guide/index-en.html</a></li>
            </ul>

            <div id="gitcode" class="collapse">
                <p>Make some changes, then...</p>
<pre><code>git checkout -b myfeature
        git commit -am "made changes"
        git checkout master
        git merge myfeature
        git commit -am "myfeature complete"
        git push bitbucket master</code></pre>
            <p>login to remote server...</p>
<pre><code>ssh myuser@mydomain.com
        cd ~/path/to/project</code></pre>
            <p>now pull from the repo</p>
<pre><code>git fetch --all
        git reset --hard origin/master</code></pre>
            </div>
        </div>
    </article>

    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/logo_phpstorm.svg" alt=""/>
            <p class="text">Integrated Development Environment</p>

        </div>
        <div class="article-content">
            <p class="lead">PhpStorm — PHP IDE that goes beyond the language</p>
            <p>Perform many routine tasks right from the IDE, thanks to Version Control Systems integration (Git, SVN, etc.), local history, support for remote deployment, SQL and databases, command-line tools, Vagrant, Composer, PHP UML, terminal, built-in REST Client and SSH Console with remote tools.</p>
            <img class="img-responsive" src="assets/img/storm.png" alt=""/>
        </div>

    </article>


    <article id="jira">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/800px-JIRA_logo.svg.png" alt=""/>
            <p class="text">Project Manager</p>
            <p class="text"><a href="https://www.atlassian.com/software/jira">www.atlassian.com</a></p>

        </div>
        <div class="article-content">
            <h3>JIRA</h3>
            <p>We use JIRA to track time, issues, and development sprints.  I'd say we have a roughly Agile workflow.  Our team is not big enough to necessitate all formal aspects of Agile, but what we do is "more agile than waterfall".</p>
            <p>I look forward to someday working with a larger team and learning more about how Agile and tools like JIRA can improve our workflow.</p>
            <p>"JIRA is the tracker for teams planning and building great products. Thousands of teams choose JIRA to capture and organize issues, assign work, and follow team activity. At your desk or on the go with the new mobile interface, JIRA helps your team get the job done."</p>
        </div>
    </article>

    <h2>Code Samples</h2>

    <article id="bitbucket">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/bitbucket-logo.png" alt=""/>
            <p class="text"><a href="https://bitbucket.org">Bitbucket</a></p>
        </div>
        <div class="article-content">
            <div class="btn-group pull-right">
                <a class="btn btn-info" href="https://bitbucket.org/rgrissinger"><i class="fa fa-bitbucket"></i> Fork Me</a>
            </div>
            <h3>Public, Private, and Team Source Control</h3>
            <p>Also integrates well with JIRA</p>

            <ul>
                <li><a href="vagrantServer">vagrantServer</a>Vagrant Environment/Database Managment</li>
                <li><a href="codeigniter">CodeIgniter Demo</a></li>
                <li><a href="codeigniter">CakePHP Demo</a>broken, no database, deployment incomplete</li>
            </ul>
            <p>I have a few personal projects here, and our company hosts our code here. see also <a href="#github">github</a>.</p>
        </div>
    </article>

    <article id="github">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/Octocat.png" alt=""/>
            <p class="text"><a href="https://github.com/">Github</a></p>
            <p class="text">Social Coding</p>
        </div>
        <div class="article-content">
            <div class="btn-group pull-right">
                <a class="btn btn-info" href="https://github.com/rgrigga?tab=repositories"><i class="fa fa-github"></i> Fork Me</a>
            </div>
            <h3>Social Coding</h3>
            <p>I have a few repos here, see also <a href="#bitbucket">bitbucket</a>.</p>
        </div>
    </article>

    <h2>Frameworks</h2>
    <article id="laravel">

        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/laravel-four-icon.png" alt=""/>
            <p class="text">for Web Artisans</p>
        </div>
        <div class="article-content">
            <button class="btn pull-right" data-toggle="collapse" data-target="#laravelcode"><i class="fa fa-code"></i> Code</button>
            <h3>Laravel</h3>
            <p class="small">I have used both versions 3 and 4, currently 4.2</p>
            <p>This site was built with Laravel, and I strongly prefer it to any other framework for a number of reasons.  Most importantly, it is diverse, stable, modular, and well-documented.  I hope I get the chance to buy Taylor a beer someday.</p>
            <p>Bottom line: I feel strongly that Laravel is the future of PHP.  It has significantly upward momentum - and while they are great tools, I am uncertain the same can be said for the others.</p>
            <div id="laravelcode" class="collapse">
                <?php $eot2=<<<'EOT2'
    laravel new mysite
    php artisan generate:scaffold accounts --fields="id:int,name:string,active:int"
    php artisan migrate
    php artisan db:seed
    php artisan serve localhost:8888
    php artisan tail staging
EOT2;
                ?>
                <pre><code>{{{$eot2}}}</code></pre>
                elsewhere...
                <?php $eot3=<<<'EOT3'
    SSH::into('staging')->define('deploy', array(
        'cd /var/www',
        'git pull origin master',
        'php artisan migrate',
    ));
EOT3;
                ?>
                <pre><code>{{{$eot3}}}</code></pre>

            </div>
        </div>
    </article>

    <article id="cake">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/cakephp_logo_250_trans.png" alt=""/>
            <p class="text">CakePHP: the rapid development framework.</p>
            <p class="text"><a href="http://cake.php/">cakephp</a></p>
            <p class="text"><a href="http://bakery.cakephp.org/">bakery.cakephp.org/</a></p>
        </div>
        <div class="article-content">
            <div class="btn-group pull-right">

                <a class="btn btn-info" href="https://bitbucket.org/rgrissinger/mycake"><i class="fa fa-github"></i> Fork the Demo</a>
                <a class="btn btn-info" href="http://cake.gristech.com/"><i class="fa fa-external-link-square"></i> My CakePHP Demo Site</a>
                <button class="btn" data-toggle="collapse" data-target="#cakecode"><i class="fa fa-code"></i> Code</button>
            </div>

            <h3>CakePHP</h3>
            <p>Layers are good!  Cake has a very straightforward structure that is relatively easy to learn.</p>
            <p>I am currently working on a project in CakePHP, and it's going pretty well so far.  I like cake's MVC implementation.</p>
            <p>My major concerns on this day are some inconsistencies in the docs.  Cake 3 is almost out, but it's in alpha right now.</p>

            <div id="cakecode" class="collapse">
    <pre><code>class PostsController extends AppController {
            public $helpers = array('Html', 'Form', 'Session');
            public $components = array('Session');
            public function index() {
            $this->set('posts', $this->Post->find('all'));
            }
            ...</code></pre>
            </div>

            <p>One unique thing with Cake is the <a href="http://book.cakephp.org/2.0/en/core-libraries/behaviors/tree.html">Tree</a>.</p>
            
            <p><a href="http://bakery.cakephp.org/articles/systematical/2013/05/08/how_to_log_php_errors_and_sql_to_chrome_console_in_cakephp">How To</a>Log PHP Errors and SQL to Chrome Console in CakePHP</p>
        </div>
    </article>

    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/cilogo.png" alt=""/>
            <p class="text">Codeigniter</p>
        </div>
        <div class="article-content">

            <div class="btn-group pull-right">
                <a class="btn btn-info" href="http://ci.gristech.com/demo">
                    <i class="fa fa-external-link-square"></i> My Codeigniter Demo Site</a>
                <a class="btn btn-info" href="https://github.com/rgrigga/CodeIgnited"><i class="fa fa-github"></i> Fork The Demo</a>
            </div>
            <h3>Codeigniter</h3>
            <p>This concerns me:</p>
            <p class="small">9th July, 2013</p>
            <p class="lead">EllisLab Seeking New Owner for CodeIgniter</p>
            <p>...</p>
            <p>"In the last few years we moved CodeIgniter’s development truly into the open and assigned lieutenants from the community to help manage the repository.  Yet, we are not a services company so funding models that would allow us to dedicate significant resources to CodeIgniter, such as those used by Linux, Mozilla, Zend, Magento, etc., would not work without radically changing our focus. As a result, we have always been unable to be involved to the degree we feel the project owner should. That means this project is not the right fit for EllisLab. So beginning today we are officially seeking a new home for CodeIgniter."</p>
            <p>...</p>
            <a href="https://ellislab.com/blog/entry/ellislab-seeking-new-owner-for-codeigniter">Read More</a>
        </div>
    </article>


    <article id="jquery">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/jquery_logo.png" alt=""/>
            <p class="text">Javascript Library</p>
            <p class="text"><a href="http://jquery.com/">http://jquery.com/</a></p>
        </div>
        <div class="article-content">
            <button class="btn" data-toggle="collapse" data-target="#jquerycode"><i class="fa fa-code"></i> Code</button>
            <h3>JQuery: The Write Less, Do More, JavaScript Library.</h3>
            <p>
                jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers. With a combination of versatility and extensibility, jQuery has changed the way that millions of people write JavaScript.
            </p>
            <div id="jquerycode" class="collapse">
                <?php $eot3=<<<'EOT3'
    $('document').ready(function(){

        $('.trigger').on('mouseenter',function(){
            $(this).find('img').animate({
                opacity:1
            },500,function(){

            });

            $(this).find('.text').animate({
                opacity:1
            },500,function(){

            });
            $(this).siblings('.article-content').animate({
                opacity:1
            },500,function(){

            });

        });
        $('article').on('mouseleave',function(){
            $(this).find('.trigger > img').animate({
                opacity:0.5
            },500,function(){

            });
            $(this).find('.trigger > .text').animate({
                opacity:0
            },500,function(){

            });
            $(this).find('.article-content').animate({
                opacity:0
            },500,function(){

            });
        });

        $('#example').popover({
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
        });
    });
EOT3;
                ?>
                <pre><code>{{{$eot3}}}</code></pre>
            </div>
        </div>
    </article>


    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/twitter-bootstrap.jpg" alt=""/>
            <p class="text">"The" Front-end Framework</p>
        </div>
        <div class="article-content">
            <p class="lead">One framework, every device.</p>
            <p>"Bootstrap easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries."</p>
            <p>Using bootstrap encourages "many" conventions, which I find very appealing.  It's so powerful, and so good at so many things... I can't say enough good about this amazing tool.</p>
            <p>I use bootstrap daily, and I really enjoy it.</p>
        </div>
    </article>



    <article id="wordpress">
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/wordpress-logo-stacked-rgb.png" alt=""/>
            <p class="text">Content Management System</p>

        </div>
        <div class="article-content">
            <div class="btn-group pull-right">
                <a class="btn btn-info" href="http://buckeyemower.com/"><i class="fa fa-external-link"></i> buckeyemower.com</a>
                <a class="btn btn-info" href="http://gristech.com/"><i class="fa fa-external-link"></i> gristech.com</a>
                <a class="btn"><i class="fa fa-chevron-circle-down"></i> Screenshots</a>
            </div>
            <h3>60 Million People can't be wrong</h3>
            <p>"WordPress started in 2003 with a single bit of code to enhance the typography of everyday writing and with fewer users than you can count on your fingers and toes. Since then it has grown to be the largest self-hosted blogging tool in the world, used on millions of sites and seen by tens of millions of people every day."</p>
            <p>I currently manage a multi-site installation of Wordpress.  I am fond of it's overall functionality and ease of use, but I think it's fair to say that wordpress is not exactly php.  It has it's own syntax that is tolerable, but not as sensible as that of truly modern oop php code.  I prefer to write php, vs. plugins, hooks, shorttags, and "the loop".</p>
        </div>
    </article>

    <article id="composer">
        <div class="trigger">

            <img class="img-responsive myimg" src="assets/img/logo-composer-transparent.png" alt=""/>
            <p class="text">Dependency Management</p>
            <p class="text"><a href="https://getcomposer.org/">getcomposer.org/</a></p>

        </div>
        <div class="article-content">
            <button class="btn" data-toggle="collapse" data-target="#composercode"><i class="fa fa-code"></i> Code</button>
            <h3>Composer</h3>
            <p class="lead">Composer > PEAR</p>
            <p>"Composer is not a package manager. Yes, it deals with "packages" or libraries, but it manages them on a per-project basis, installing them in a directory (e.g. vendor) inside your project. By default it will never install anything globally. Thus, it is a dependency manager."</p>
            <p>Phil Sturgeon explains: <a href="http://philsturgeon.uk/blog/2012/03/packages-the-way-forward-for-php">Packages: The Way Forward for PHP</a></p>

            <div id="composercode" class="collapse">
                <?php $eot=<<<'EOT'
    ...
    "repositories": [
            {
                "type": "vcs",
                "url":  "git@github.com:rgrigga/blog"
            },
            {
                "type": "vcs",
                "url":  "git@github.com:rgrigga/video"
            }
        ],
        "require": {
            "laravel/framework": "4.2.x",
            "rgrigga/blog":"dev-master",
            "rgrigga/video":"dev-master",
            "leafo/lessphp": "0.4.0"
        },
    ...
EOT;
                ?>
                <pre><code>{{{$eot}}}</code></pre>
            </div>

            <p>see also: <a href="https://packagist.org/">Packagist</a></p>
        </div>
    </article>

    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/bower-logo.png" alt=""/>
            <p class="text">Bower</p>
            <p class="text"><a href="http://bower.io/">bower.io</a></p>

        </div>
        <div class="article-content">
            <p class="lead">Bower: A Package Manager for the Web</p>
            <p>Bower is to assets as Composer is to php</p>
    <pre><code>bower install jquery
            bower install less
            bower install bootstrap
            bower install font-awesome</code></pre>
        </div>
    </article>

    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/Pma_logo.png" alt=""/>
            <p class="text">mysql database management</p>
            <p class="text"><a href="http://www.phpmyadmin.net/">www.phpmyadmin.net</a></p>

        </div>
        <div class="article-content">
            <p class="lead">phpMyAdmin</p>
            <p>phpMyAdmin is a free software tool written in PHP, intended to handle the administration of MySQL over the Web. phpMyAdmin supports a wide range of operations on MySQL, MariaDB and Drizzle. Frequently used operations (managing databases, tables, columns, relations, indexes, users, permissions, etc) can be performed via the user interface, while you still have the ability to directly execute any SQL statement.</p>
        </div>
    </article>





    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/less-css-logo.png" alt=""/>
            <p class="text">CSS Preprocessor</p>
            <p class="text"><a href="http://lesscss.org/">lesscss.org</a></p>

        </div>
        <div class="article-content">
            <p class="lead">less.js</p>
            <p>Less is a CSS pre-processor, meaning that it extends the CSS language, adding features that allow variables, mixins, functions and many other techniques that allow you to make CSS that is more maintainable, themable and extendable.</p>
        </div>
    </article>


    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/html5-logo.png" alt=""/>
            <p class="text">The New Standard in Hyper Text</p>
            <p class="text"><a href="http://www.html5rocks.com/en/">html5rocks.com</a></p>

        </div>
        <div class="article-content">
            <p class="lead">HTML5</p>
            <p>HTML5 is a core technology markup language of the Internet used for structuring and presenting content for the World Wide Web.</p>
            <div id="html5code">
                <?php $eot=<<<'EOT'
        <aside id="opsystems">
            <article>
                <h4>Linux</h4>
                <img class="img-responsive myimg" src="assets/img/Tux-Shirt.svg.png" alt=""/>
                <p>It has been said that linux has a steeper learning curve, but I recently had my 10-year old son install Ubunutu on 3 different computers, and the kids love it.  It's simple: it's compact, stable, safe... no viruses to worry about, and all our home PC's boot fast and play well together.</p>
                <p>Not to mention that most of the internet runs on Linux, so why not learn it?</p>
            </article>
            <article>
                <h4>Mac</h4>
                <img class="img-responsive myimg" src="assets/img/Apple_logo_black.svg" alt=""/>
                <p>My first computer was an apple IIc, and I used powermacs and iMacs all the way through grade school, high school, and college.  I have not used a mac lately, but I hear they're very user-friendly.</p>
                <p>The other thing that bothers me about mac is that I can't hack on the hardware.  I have old machines lying around that I use as fileservers and experiments, but macs are 100% disposable.</p>
            </article>
            <article>
                <h4>Windows</h4>
                <img class="img-responsive myimg" src="assets/img/Eski-Windows-6.png" alt=""/>
                <p>I own several, and have used many Windows PC's, but I do not get warm fuzzies when I think about the "Microsoft Addiction", specifically in regards to business licensing.  I have massive respect for Bill Gates and co., but I disagree with some of their strategies and tactics.</p>
                <p>The best argument for me to keep windows around is that most PC users of the applications I build are going to be on windows machines.  Therefore, I can still boot into Windows 7 Pro or XP anytime I like.</p>
                <p>I have considerable prior experience with Microsoft Office, including VBA, Excel, Word, Access, and PowerPoint</p>
            </article>
        </aside>
EOT;
                ?>
                <pre><code>{{{$eot}}}</code></pre>

            </div>
        </div>
    </article>

    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/css3_logo_wide.png" alt=""/>
            <p class="text">Cascading Style Sheets</p>

        </div>
        <div class="article-content">
            <p class="lead">CSS3</p>
            <p>CSS3 is the latest version of the CSS specification. The term “CSS3” is not just a reference to the new features in CSS, but the third level in the progress of the CSS specification. CSS3 contains just about everything that's included in CSS2.1 (the previous version of the specification).</p>
        </div>
    </article>

    <article>
        <div class="trigger">
            <img class="img-responsive myimg" src="assets/img/osi_standard_logo.png" alt=""/>
            <p class="text">Free Freedom and Beer</p>
            <p class="text"><a href="http://opensource.com/resources/what-open-source">opensource.com</a></p>

        </div>
        <div class="article-content">
            <p class="lead">By the people, For the people</p>
            <p>Open source software benefits programmers and non-programmers alike. In fact, because much of the Internet itself is built on many open source technologies—like the Linux operating system and the Apache Web server application—anyone using the Internet benefits from open source software. Every time computer users view webpages, check email, chat with friends, stream music online, or play multiplayer video games, their computers, mobile phones, or gaming consoles connect to a global network of computers that routes and transmits their data to the "local" devices they have in front of them.</p>
        </div>
    </article>
</section>

</div>
@stop

@section('sidebar')
<div class="sidebar">
    <blockquote>
        <p>
            The more I learn, the more I realize I don't know. The more I realize I don't know, the more I want to learn.
        </p>
        <footer>Albert Einstein via <cite>@AlbertE_Quotes</cite></footer>
    </blockquote>
</div>
@stop
