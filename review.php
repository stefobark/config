<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
require_once('functions.php');
print_header();

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = array();
}

$searchd             = process_searchd();
$_SESSION['searchd'] = $searchd;

//contain this and make a row for all searchd config blocks..
echo "<div class='container' style='margin-top:100px!important'>";

echo "<div class='button'>
				<div class='row'>
					<div class='col-md-5'></div>
					<div class='col-md-1'>
						<a href='final.php'>
							<img src='bluesphinx.png' style='margin-top:20px'>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-5'></div>
					<div class='col-md-1'>
						<p class='help-block'>
							go copy cleaner version
						</p>
						</a>
					</div>
				</div>
			</div>
			<div class='col-md-2'></div>
			<div class='col-md-3'>";

echo "
			<h3>searchd:</h3>";

print_searchd($_SESSION['searchd']);

echo "</div>
			<div class='col-md-3'>
			<h3>indexes</h3>";

print_index($_SESSION['index']);


//add link back to build another index, start row, add header
echo "
			<a href='index_options.php'>
				<span class='glyphicon glyphicon-plus-sign'></span>
				&nbsp;add another index&nbsp;
				<span class='glyphicon glyphicon-plus-sign'></span>
			</a>
		</div>
		<div class='col-md-3'>
		<h3>sources:</h3>
			";

print_source($_SESSION['source'], $_SESSION['source_type']);

//make a link to add another source
echo "
				<a href='plainconfig.php'>
					<span class='glyphicon glyphicon-plus-sign'></span>
					&nbsp;add another source&nbsp;<span class='glyphicon glyphicon-plus-sign'></span>
				</a>
		</div>
	</div>
</div>";

?>
