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
				<div class="col-md-3">
						<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;<strong>Plain indexes</strong> (or, "batch indexes") are generated with "indexer"-- documents are indexed in batches.</p>
						<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;With <strong>real time indexes</strong>, indexer is not involved. You just push documents into the index and they are immediately availble for searching.</p>
						<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;<strong>Template indexes</strong> don't actually hold data-- they're used as "templates", to hold index settings (useful for snippets and a few other things).</p>
						<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;The <strong>distributed index</strong> type is really just a map that points to other instances of searchd. Your application can query this distributed index to search all the different Sphinx nodes.</p>
					</div>
					<div class="col-md-1"></div>
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
    if ($_SESSION['index_type'] !== 'plain') {
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
				<div class="col-md-12">
					<h4 class="text-center">Environment Variables?</h4><br />
					<div class='btn-group btn-group-justified text-center'>
							<a href="source.php?scripted=/bin/bash"><button type='button' class='btn btn-info'>Yes</button></a>
							<a href='source.php'><button type='button' class='btn btn-warning'>No</button></a>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					Using environment variables to pass host, user, password, db, and port in the source section:
					<br />
				</div>
			</div>
			<div class="row">
			<div class="col-md-3"></div>
				<div class="col-md-6"><br />
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
