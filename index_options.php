<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
require_once('functions.php');
print_header();
$source_string =& source_to_string();

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = array();
}

//if post stuff was sent, and concatenated onto this string, turn that source string into an element of a session array
if (isset($_POST["source_name"])) {
    $_SESSION["source"][] = $source_string;
}


echo "
<div class='container'>
	<div class='row' style='margin-top:75px'>";

print_index_form($_SESSION["type"]);

echo "</div>";

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
