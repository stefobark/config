<?php
require_once('functions.php');
session_start();
print_header();

		
echo "
		<div class='container' style='margin-top:75px'>
			<p class='alert alert-info text-center'>now, copy and paste this into some text editor. save it. name it something like 'sphinxish.conf'</p>";

open_output();
print_source($_SESSION['source'], $_SESSION['type']);
print_index($_SESSION['index']);
print_searchd($_SESSION['searchd']);
close_output();

echo 		"
		</div>
	</div>";

?>
