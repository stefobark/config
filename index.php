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
						Enter information into the following fields to build a Sphinx configuration file. Read the descriptions and follow links to the Sphinx docs to 
						learn more about each of the options.
					</p>
					<p class='help-block'>
						And, before you get started, you might want to read <a href="http://sphinxsearch.com/blog/2013/11/05/sphinx-configuration-features-and-tricks/">
						this nice blog post</a> about some of the neat
						things you can do with a Sphinx configuration file.
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
    
    if ($_SESSION['index_type'] !== 'rt') {
        echo <<<HERE
		<div class="container" style='margin-top:100px!important'>
			<div class="row">
				<div class="col-md-6">
					<h2>Environment Variables?</h2><br />
					<div class='btn-group btn-group-justified text-center'>
							<a href="source.php?scripted=/bin/bash"><button type='button' class='btn btn-info'>Yes</button></a>
							<a href='source.php'><button type='button' class='btn btn-warning'>No</button></a>
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
					Passing host, user, password, db, and port in the source section:
					<br />
				</div>
			</div>
			<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-11"><br />
					<code>
					#!/bin/bash<br />
					printf "<br />
					source docs<br />
					{<br />
						type                = mysql <br />
						sql_host            = \$SQL_HOST <br />
						sql_user            = \$SQL_USER <br />
						sql_pass            = \$SQL_PASS <br />
						sql_db              = \$SQL_DB <br />
						sql_port            = \$SQL_PORT <br />
						sql_query        	= select * from docs <br />
						sql_field_string 	= title<br />
						sql_field_string 	= content<br />
					}<br />
					</code><br />
				</div>
			</div>
			
HERE;
    }
    
}
?>
