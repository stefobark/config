<?php
require_once('functions.php');
session_start();
print_final_header();
$scripted = $_SESSION['scripted'];

echo "
		<div class='container' style='margin-top:100px'>
			<div class='row'>
			<p class='text-center'>
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
echo "<div id='copy'>";

if(strpos($scripted,'bash') !== false){
		echo "$scripted <br /><br />\n";
		}
print_source($_SESSION['source'], $_SESSION['type']);
print_index($_SESSION['index']);
print_searchd($_SESSION['searchd']);

if(strpos($scripted,'bash') !== false){
echo '"';
}

//close copy div
echo "</div>";
close_output();

echo "
		</div>
	</div>";

?>
