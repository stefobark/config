<?php
session_start();
require_once('functions.php');
print_home_header();

echo <<<HERE
<div class="container" style='margin-top:100px!important'>
	<div class="row">
HERE;
	
if (!$_SESSION["index_type"]) {
  echo "no choice";
} else {

echo <<<HERE
		<div class="col-md-4"></div>
		<div class="col-md-3">
			<h4>Choose your source type:</h4>
			<form name="type" action="plainconfig.php" method="post">
				<input type="radio" name="source_type" value="mysql">MySQL<br>
				<input type="radio" name="source_type" value="pgsql">PostgreSQL<br>
				<input type="radio" name="source_type" value="mssql">MSSQL<br>
				<input type="radio" name="source_type" value="xmlpipe2">XML<br>
				<input type="radio" name="source_type" value="tsvpipe">TSV<br>
				<input type="radio" name="source_type" value="odbc">ODBC<br>
				<input type="submit" value="Submit">
			</form>
			<h5><a href="http://sphinxsearch.com/docs/current.html#confgroup-source">learn more</a></h5>
		</div>
	</div>
</div>
HERE;

    }
?>
