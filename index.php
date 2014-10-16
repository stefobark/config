<?php
session_start();
require_once('functions.php');
print_home_header();

if ($_GET['clear'] == 'yes') {
    session_unset();
}

if (!isset($_POST['index_type'])) {
    echo <<<HERE
		<div class="container" style='margin-top:100px!important'>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<p class='help-block'>
						Answer the following questions to build a 
						configuration file. Not all options (or index types) are available.
						There will be more soon. Look at the
						helper-text to see examples of input. Follow links to the Sphinx docs to 
						learn more about each of the options.
					</p>
					<p class='help-block'>
						And, before you get started, go read <a href="http://sphinxsearch.com/blog/2013/11/05/sphinx-configuration-features-and-tricks/">
						this nice blog post</a> about some of the neat
						things you can do with a Sphinx configuration file. Eventually,
						this application will help you implement the things you read about in that blog post.
					</p>
				</div>
			</div>
			<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-3">
						<h4>Choose your index type:</h4>
						<form name="type" action="index.php" method="post">
							<input type="radio" name="index_type" value="plain">Plain<br />
							<input type="radio" name="index_type" value="rt">Realtime<br />
							<input type="radio" name="index_type" value="template">Template<br />
							<input type="radio" name="index_type" value="distributed">Distributed<br />
							<input type="submit" value="Submit">
						</form>
					</div>
				</div>
			</div>
		</div>
HERE;
} else {
    $_SESSION['index_type'] = $_POST['index_type'];
    $type                   = $_SESSION['index_type'];
    if ($_SESSION['index_type'] == 'rt') {
        echo "
		<div class='container' style='margin-top:100px!important'>
			<div class='row'>
				<div class='col-md-6'>
					<p class='help-block'>Let's build this $type index</p>
					<a href='index_options.php'><button type='button' class='btn btn-success'>Go!</button></a>
";
    }
    
    if ($_SESSION['index_type'] == 'plain') {
        echo <<<HERE
		<div class="container" style='margin-top:100px!important'>
			<div class="row">
				<div class="col-md-6">
					<h2>Environment Variables?</h2><br />
					<div class='btn-group btn-group-justified text-center'>
							<a href="source.php?scripted=/bin/bash"><button type='button' class='btn btn-info'>BASH</button></a>
							<a href='source.php'><button type='button' class='btn btn-warning'>Or, just build a regular configuration.</button></a>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-1"><span class='glyphicon glyphicon-exclamation-sign' style='font-size:50px!important'></span>
				</div>
				<div class="col-md-8"><br />
					You can pass the parameters through the environment variables right when you run indexer or searchd. <br />
					<br />
					Like this:
					<br />
				</div>
			</div>
			<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-11"><br />
					<code>
					shodan@dev1:~/trunk/src$ cat test.conf<br />
					#!/bin/bash<br />
					echo hello > 1.txt<br />
					echo \$SHARD shard >> 1.txt<br />
					 
					shodan@dev1:~/trunk/src$ SHARD=123 ./searchd -c test.conf<br />
					...<br />
					using config file 'test.conf'...<br />
					FATAL: 'searchd' config section not found in 'test.conf'<br />
					 
					shodan@dev1:~/trunk/src$ cat 1.txt<br />
					hello<br />
					123 shard
					</code><br />
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
				<span class='glyphicon glyphicon-eye-open' style='font-size:50px!important'></span>
				</div>
				<div class="col-md-8"><br />
					As you can see, our script got executed alright, and was able to access the SHARD variable that we passed to searchd. In PHP, we would need to use:

					 &lt;?php print getenv("SHARD"); ?&gt;

					instead, but you get the idea.
		</div>
HERE;
    }
    
}
?>
