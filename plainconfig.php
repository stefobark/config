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


//did they come here from the 'add mysql index' dropdown? if so, set the session variable 'type' to mysql
if(isset($_GET["type"])){
$_SESSION["type"] = $_GET["type"];
}

//if they did set the type, by clicking 'mysql', take that and stuff it into this session variable
if(isset($_POST["type"])){
$_SESSION["type"] = $_POST["type"];
} else { echo "<strong>no form input</strong>"; }

//style what comes next
echo <<<HERE
<div class='container' style='margin-top:100px'>
<div class='col-md-12 text-center'>
	<h3 class="title">Source Options</h3>
	<div class="row" style="margin-top:50px!important">
HERE;

//now check what type of source we're building
switch ($_SESSION["type"]) 
{
	case "mysql":
		
print_source_form();

		break;
	case "pssql":
		echo "Tell Sphinx how to connect to PostgreSQL";
		break;
	case "mssql":
		echo "Tell Sphinx how to connect to Evil Microsoft";
		break;
	case "xmlpipe2":
		echo "Tell Sphinx how to get your XML data";
		break;
	case "tsvpipe":
		echo "Tell Sphinx how to get your TSV data";
		break;
	case "odbc":
		echo "Tell Sphinx how to set up this ODBC connection";
		break;
}
echo <<<HERE
		</div>
	</div>
</div>
</div>
HERE;
?>
