<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();
require_once('functions.php');
print_header();

if(isset($_POST["index_name"])){
$index_string =& index_to_string($_SESSION['index_type']); 
}

$_SESSION['index'][] = $index_string;

//haven't finished indexer options... cause none of them are mandatory.. we'll just go with defaults for now.
echo <<<HERE
<div class='container' style='margin-top:75px'>
<div class='row'>
<div class='col-md-4' style="background-color:#FAFAFA">

HERE;


print_searchd_form();


echo "</div>
		<div class='col-md-4'>
		<h3>Your Indexes</h3>";


print_index($_SESSION['index']);


echo "
		<h5>
			<a href='index_options.php'>
				<span class='glyphicon glyphicon-plus-sign'></span>
				&nbsp;add another index&nbsp;
				<span class='glyphicon glyphicon-plus-sign'></span>
			</a>
		</h5>";
			
echo "</div>
		<div class='col-md-4'>
		<h3>Your Sources:</h3>
			";

print_source($_SESSION['source']);

echo <<<HERE
		<h5>
			<a href='plainconfig.php'>
				<span class='glyphicon glyphicon-plus-sign'></span>
				&nbsp;add another source&nbsp;
				<span class='glyphicon glyphicon-plus-sign'></span>
			</a>
		</h5>
	</div>
</div>
HERE;
?>
