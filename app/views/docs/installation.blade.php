<h2>Install Laravel</h2>
<pre><code>composer create-project laravel/laravel av2 --prefer-dist</code></pre>

<h2>Add to .gitignore:</h2>
<pre><code> .idea/
        .idea
        .idea/workspace.xml
        workspace.xml
</code></pre>

<h2>Configure local server for "av2.dev":</h2>
<pre>    cd /etc/apache2/sites-available
    sudo cp ag.dev.conf av2.dev.conf
    sudo nano av2.dev.conf
</pre>

(make changes)

<pre>    sudo a2ensite av2.dev
    sudo service apache2 reload
    sudo nano /etc/hosts
</pre>

(add line for av2.dev)
<pre>    sudo chmod -R 777 ~/viviosoft/av2/storage
</pre>
If all above goes well, the browser should respond to http://ag.dev

<h2>Version Control</h2>
<p>Configured for git, bitbucket, and phpstorm</p>
<ul>
	<li>
		<a href="https://bitbucket.org/dclem/agrivault-v1.0">Bitbucket</a>		
	</li>
</ul>