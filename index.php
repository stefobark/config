<?php
session_start();
require_once('functions.php');
print_home_header();
if (!$_POST["index"]) {
    echo <<<HERE
<div class="container" style='margin-top:100px!important'>
	<div class="row">
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<p class='help-block'>
					Answer the following questions to build a 
					configuration file. Only mandatory options for plain MySQL-based indexes
					are available at this point. There will be more soon. Look at the helper-text
					to see examples of input. Follow links to the 
					Sphinx docs to learn more about each of the options.
				</p>
			</div>
		</div>
	</div>
	<div class="row">
			<div class="col-md-5"></div>
				<div class="col-md-3">
					<!-- this doesn't really need to be a form. could pass info with a link. 
					should not let them choose more than one option!-->
					<h4>Choose your index type:</h4>
					<form name="type" action="index.php" method="post">
						<input type="checkbox" name="index" value="plain">Plain<br />
						<input type="checkbox" name="index" value="rt">Realtime<br />
						<input type="checkbox" name="index" value="template">Template<br />
						<input type="checkbox" name="index" value="distributed">Distributed<br />
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
HERE;
} else {
    if (!$_POST["index"]) {
        echo "no choice";
    } else {
        switch ($_POST["index"]) {
            case "plain":
                echo <<<HERE
			<div class="container" style='margin-top:100px!important'>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-3">
						<h4>Choose your source type:</h4>
						<form name="type" action="plainconfig.php" method="post">
							<input type="checkbox" name="type" value="mysql">MySQL<br>
							<input type="checkbox" name="type" value="pssql">PostgreSQL<br>
							<input type="checkbox" name="type" value="mssql">MSSQL<br>
							<input type="checkbox" name="type" value="xmlpipe2">XML<br>
							<input type="checkbox" name="type" value="tsvpipe">TSV<br>
							<input type="checkbox" name="type" value="odbc">ODBC<br>
							<input type="submit" value="Submit">
						</form>
						<h5><a href="http://sphinxsearch.com/docs/current.html#confgroup-source">learn more</a></h5>
					</div>
				</div>
			</div>
		</div>
HERE;
                $_SESSION["index_type"] = $_POST["index"];
                break;
            
            case "rt":
                echo "Let's build a Realtime index";
                $_SESSION["index_type"] = $_POST["index"];
                break;
            
            case "template":
                echo "Let's build a Template index";
                $_SESSION["index_type"] = $_POST["index"];
                break;
            
            case "distributed":
                echo "Let's build a distributed index";
                $_SESSION["index_type"] = $_POST["index"];
                break;
        }
    }
}
?>
