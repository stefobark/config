<?php
session_start();
require_once('functions.php');
print_home_header();

if(!isset($_GET['scripted'])){
	if(!isset($_POST['index_type'])){
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
	} 
	else
	{
		$_SESSION['index_type'] = $_POST['index_type'];
		$choice = $_SESSION['index_type'];
		echo <<<HERE
		<div class="container" style='margin-top:100px!important'>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<h2>Scripted Config?</h2>
					<div class='btn-group btn-group-justified'>
							<a href='index.php?scripted=/usr/bin/php'><button type='button' class='btn btn-info'>PHP</button></a>
							<a href='index.php?scripted=/bin/bash'><button type='button' class='btn btn-info'>BASH</button></a><br /><br />
							<a href='source.php'><button type='button' class='btn btn-warning'>Or, not. Just build it.</button></a>
						</p>
					</div>
				</div>
			</div>
		</div>
HERE;
		}
	} 
else if($_SESSION['index_type'] == 'plain'){
	$_SESSION['scripted'] = "#!" . $_GET['scripted'];
	$script = $_SESSION['scripted'];
	$choice = $_SESSION['index_type'];
	echo <<<HERE
	<div class="container" style='margin-top:100px!important'>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
	<h2>Perfect.</h2>
	<p class='help-block'>Let's build this scripted $choice index</p>
	<a href='source.php'><button type='button' class='btn btn-success'>Go!</button></a>
HERE;
}
?>
