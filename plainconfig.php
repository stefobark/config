<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();
require_once('functions.php');
print_header();

if(!isset($_SESSION["source"])){
$_SESSION["source"] = array();
}


//did they come here from the dropdown? if so, set the session variable 'type' to mysql
if(!empty($_GET["source_type"])){
$_SESSION["source_type"] = $_GET["source_type"];
} else if(isset($_POST["source_type"])){
$_SESSION["source_type"] = $_POST["source_type"];
}


//style what comes next
echo <<<HERE
<div class='container'>
	<div class='row' style="margin-top:75px!important">
		<div class='col-md-4' style="background-color:#FAFAFA!important">
			<h3 class="title">Source Options</h3>
			<p class='help-block'>If you chose to make a scripted configuration, you can now use your environment variables.</p>

HERE;

print_source_form($_SESSION["source_type"]);


echo "</div>
		<div class='col-md-4' style='background-color:#EFF8FB'>";

if(!empty($_SESSION['index'])){

echo "<h3>Index(es):</h3>";

	print_index($_SESSION['index']);


	echo "
			<h5>
				<a href='index_options.php'>
					<span class='glyphicon glyphicon-plus-sign'></span>
					&nbsp;add another index&nbsp;
					<span class='glyphicon glyphicon-plus-sign'></span>
				</a>
			</h5>";
}

echo "</div>
		<div class='col-md-4' style='background-color:#FBFBEF'>";

if(!empty($_SESSION['source'])){
echo "
			<h3>Source(s):</h3>
			";

print_source($_SESSION['source']);
}

echo <<<HERE
		
	</div>
</div>
</div>
HERE;
?>
