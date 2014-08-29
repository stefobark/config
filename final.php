<?php
require_once('functions.php');
session_start();
print_final_header();
$scripted = $_SESSION['scripted'];

echo "
		<div class='container' style='margin-top:100px'>
			<div class='row'>
			<p class='text-center'>Copy and paste this into some text editor. Save it. <br />
			Name it something like 'sphinxish.conf'. Then, run it. <br /><br />
			Like this:<br />
			<p class='help-block text-center'>
			indexer -c /path/to/your_config.conf index_name <br />
			</p>
			<p class='text-center'>
			List the indexes you want to index or, use '--all' instead of a single index name.<br />
			<img src='bluesphinx.png' id='copy-button' class='text-center' style='margin-top:25px; margin-bottom:25px!important'><br />
			<button id='copy-button'>copy to clipboard</button><br /></p></div>";

echo <<<HERE
<script type="text/javascript">
$(document).ready(function(){
$("button#copy-button").zclip({
    path: "http://www.steamdev.com/zclip/js/ZeroClipboard.swf",
    copy:$('div#copy').text()});

});
</script>
HERE;

open_output();
echo "<div id='copy'>
		$scripted <br /><br />\n";
print_source($_SESSION['source'], $_SESSION['type']);
print_index($_SESSION['index']);
print_searchd($_SESSION['searchd']);
//close copy div
echo "</div>";
close_output();

echo "
		</div>
	</div>";

?>
