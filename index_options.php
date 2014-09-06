<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once('functions.php');
session_start();
print_header();


//if we haven't already declared this to be an array, do it.
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = array();
}

//if we have 'source' form info concatenate, insert into a session variable 
if(isset($_POST['source_name'])){
	$source_string = source_to_string();
   $_SESSION["source"][] = $source_string;
}

//print_index_form does some formatting, so open a container and a row and drop it down 75px)
echo "
<div class='container' style='margin-top:75px'>
<div class='row'>";

//did they come here from the 'add ... index' dropdown? if so, set the session variable 'type'
if(isset($_GET["index_type"])){
$_SESSION["index_type"] = $_GET["index_type"];
}

//have they alrady told us what type of index to build? if so, print the index options form
if(isset($_SESSION["index_type"])){

print_index_form($_SESSION["index_type"]);
}
else {
echo "<p class='help-block' style='margin-top:75px'><strong>no form input for index type.. maybe the session died?</strong></p>
		<p class='help-block'><a href='index.php'>go back</a></p>";
}

echo "<div class='col-md-4' style='background-color:#EFF8FB'>";

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

if(isset($_SESSION['source'])){
echo "
			<h3>Source(s):</h3>
			";

//foreach($_SESSION['source'] as $echoo){
//echo $echoo;
//}

print_source($_SESSION['source']);

echo <<<HERE
		<h5>
			<a href='source.php'>
				<span class='glyphicon glyphicon-plus-sign'></span>
				&nbsp;add another source&nbsp;
				<span class='glyphicon glyphicon-plus-sign'></span>
			</a>
		</h5>
HERE;
}

echo "</div>
		</div>";
	
?>
