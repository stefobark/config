<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
require_once('functions.php');
print_header();

//if we have 'source' form info concatenate and insert into a session variable
if(isset($_POST['source_name'])){
$source_string =& source_to_string();
}

//if we haven't already declared this to be an array, do it.
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = array();
}

//if post stuff was sent, and concatenated onto this string, turn that source string into an element of a session array
if (isset($_POST["source_name"])) {
    $_SESSION["source"][] = $source_string;
}

//print_index_form does some formatting, so open a container and a row and drop it down 75px)
echo "
<div class='container'>
	<div class='row' style='margin-top:75px'>";

print_index_form($_SESSION["type"]);

//close the row
echo "</div>";

//if we have indexes, echo them.
if (isset($_SESSION["index"])) {
    echo "<h3>indexes</h3>";
    open_output();
    print_index($_SESSION["index"]);
    close_output();
}

echo "
		<h3>sources:</h3>";

if (isset($_SESSION["index"])) {
    open_output();
    print_source($_SESSION['source'], $_SESSION['type']);
    close_output();
}



//close the row div and make a link to add another source
echo "
	<h5>
		<a href='plainconfig.php'><span class='glyphicon glyphicon-plus-sign'></span>&nbsp;add another source&nbsp;<span class='glyphicon glyphicon-plus-sign'></span></a>
	</h5>
</div>";
?>
