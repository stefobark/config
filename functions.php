<?php

function &searchd_to_string()
{
    
    if (isset($_POST['listen'])) {
        $f_searchd_string = $_POST['listen'] . "##";
    }
    if (isset($_POST['log'])) {
        $f_searchd_string .= $_POST['log'] . "##";
    }
    if (isset($_POST['query_log'])) {
        $f_searchd_string .= $_POST['query_log'] . "##";
    }
    if (isset($_POST['pid'])) {
        $f_searchd_string .= $_POST['pid'] . "##";
    }
    
    if (isset($_POST["listen"])) {
        $_SESSION["searchd"] = $f_searchd_string;
    }
    
    return $f_searchd_string;
}

function &index_to_string()
{
    
    if (isset($_POST["index_name"])) {
        $f_index_string = $_POST["index_name"] . "##";
    } else {
        echo "form input didn't work";
    }
    
    if (isset($_POST["index_source_name"])) {
        $f_index_string .= $_POST["index_source_name"] . "##";
    } else {
        echo "form input didn't work";
    }
    
    if (isset($_POST["index_path"])) {
        $f_index_string .= $_POST["index_path"] . "##";
    } else {
        echo "form input didn't work";
    }
    
    if (!isset($_SESSION['index'])) {
        $_SESSION['index'] = array();
    }
    
    $_SESSION['index'][] = $f_index_string;
    
    return $f_index_string;
}

function &source_to_string()
{
    
    if (isset($_POST['source_name'])) {
        $f_source_string = $_POST['source_name'] . "##";
    }
    if (isset($_POST['sql_host'])) {
        $f_source_string .= $_POST['sql_host'] . "##";
    }
    if (isset($_POST['sql_port'])) {
        $f_source_string .= $_POST['sql_port'] . "##";
    }
    if (isset($_POST['sql_user'])) {
        $f_source_string .= $_POST['sql_user'] . "##";
    }
    if (isset($_POST['sql_pass'])) {
        $f_source_string .= $_POST['sql_pass'] . "##";
    }
    if (isset($_POST['sql_db'])) {
        $f_source_string .= $_POST['sql_db'] . "##";
    }
    if (isset($_POST['sql_sock'])) {
        $f_source_string .= $_POST['sql_sock'] . "##";
    }
    if (isset($_POST['mysql_connect_flags'])) {
        $f_source_string .= $_POST['mysql_connect_flags'] . "##";
    }
    if (isset($_POST['mysql_ssl_cert'])) {
        $f_source_string .= $_POST['mysql_ssl_cert'] . "##";
    }
    if (isset($_POST['mysql_ssl_key'])) {
        $f_source_string .= $_POST['mysql_ssl_key'] . "##";
    }
    if (isset($_POST['mysql_ssl_ca'])) {
        $f_source_string .= $_POST['mysql_ssl_ca'] . "##";
    }
    if (isset($_POST['attributes'])) {
        $f_source_string .= $_POST['attributes'] . "##";
    }
    if (isset($_POST['sql_query'])) {
        $f_source_string .= $_POST['sql_query'] . "##";
    }
    if (isset($_POST['sql_joined_field'])) {
        $f_source_string .= $_POST['sql_joined_field'] . "##";
    }
    if (isset($_POST['sql_query_range'])) {
        $f_source_string .= $_POST['sql_query_range'];
    }
    if (isset($f_source_string)) {
        $f_source_string .= $_SESSION['type'];
    }
    //if the session source is not set, say 'its and array'.
    if (!isset($_SESSION["source"])) {
        $_SESSION["source"] = array();
    }
    return $f_source_string;
}

function open_output()
{
    echo <<<HERE
<div class="row">
<div class="col-md-4">
HERE;
}

function close_output()
{
    echo <<<HERE
</div>
</div>
HERE;
}

function print_index_form($sesh_type)
{
    $type = $sesh_type;
    echo <<<HERE
<div class="col-md-4">
	<h3>make a $type index</h3>
	<form role='form' name='index' action='searchd_options.php' method='post'>
		<div class='form-group'>
				<label for='index_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>Name this Index (mandatory)</a></label><br />
				<input type='text' name='index_name' placeholder='test_index'>
		</div>
		<div class='form-group'>
				<label for='index_source_name'><a href='http://sphinxsearch.com/docs/current.html#conf-sql-host'>Choose Source Name (mandatory)</a></label><br />
				<input type='text' name='index_source_name' placeholder='src1'>
		</div>
		<div class='form-group'>
				<label for='index_path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
				<input type='text' name='index_path' placeholder='/var/data/test'>
		</div>
		<div class='form-group'>
			<input type='submit' value='Submit'>
		</div>
	</form>
</div>
HERE;
}

function print_source_form()
{
    echo <<<HERE
<form role="form" name="host" action="index_options.php" method="post">
		<div class="col-md-12 text-center">
			<div class="form-group">
				<label for="source_name"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Source Name (mandatory)</a></label><br />
				<input type="text" name="source_name" placeholder="src1"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 text-center">
			<div class="form-group">
				<label for="sql_host"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Host (mandatory)</a></label><br />
				<input type="text" name="sql_host" placeholder="localhost or 127.0.0.1">
			</div>
			<div class="form-group">
				<label for="sql_port"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-port">Port (mandatory)</a></label><br />
				<input type="text" name="sql_port" placeholder="3306">
			</div>
			<div class="form-group">
				<label for="sql_user"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-root">User (mandatory)</a></label><br />
				<input type="text" name="sql_user" placeholder="root">
			</div>
			<div class="form-group">	
				<label for="sql_pass"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-pass">Password</a></label><br />
				<input type="text" name="sql_pass" placeholder="password">
			</div>
		
			<div class="form-group">	
				<label for="sql_db"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-db">Database Name (mandatory)</a></label><br />
				<input type="text" name="sql_db" placeholder="db_name">
			</div>
		</div>
		<div class="col-md-6 text-center">
			<div class="form-group">	
				<label for="sql_sock"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-sock">UNIX Socket Name</a></label><br />
				<input type="text" name="sql_sock" placeholder="/tmp/mysql.sock">
			</div>
			<div class="form-group">	
				<label for="mysql_connect_flags"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-connect-flags">MySQL Connect Flags</a></label><br />
				<input type="text" name="mysql_connect_flags" placeholder="32 # enables compression"> 
			</div>
			<div class="form-group">	
				<label for="mysql_ssl_cert"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">MySQL Client Certificate</a></label><br />
				<input type="text" name="mysql_ssl_cert" placeholder="/etc/ssl/client-cert.pem">
			</div>
			<div class="form-group">	
				<label for="mysql_ssl_key"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">MySQL Client Key</a></label><br />
				<input type="text" name="mysql_ssl_key" placeholder="/etc/ssl/client-key.pem"> 
			</div>
			<div class="form-group">
				<label for="mysql_ssl_ca"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">CA Certificate</a></label><br />
				<input type="text" name="mysql_ssl_ca" placeholder="/etc/ssl/client-cacert.pem">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="form-group">
				<label for="sql_query"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query">Main Query (mandatory)</a></label><br />
				<textarea name="sql_query" placeholder="SELECT id, group_id, UNIX_TIMESTAMP(date_added) AS date_added, title, content FROM documents" style="width:800px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="attributes"><a href="http://sphinxsearch.com/docs/current.html#attributes">Attributes</a> <br /></label><br />
				<textarea name="attributes" rows="4" placeholder="Comma separated! Like this: sql_attr_uint=something, sql_attr_json=something, etc..." style="width:800px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="sql_joined_field"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-joined-field">Joined Field(s)</a></label><br />
				<textarea name="sql_joined_field" type="text" placeholder="tagstext from query; SELECT docid, CONCAT('tag',tagid) FROM tags ORDER BY docid ASC" style="width:800px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="sql_query_range"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query-range">Ranged Query</a></label><br />
				<textarea type="text" name="sql_query_range" placeholder="SELECT MIN(id),MAX(id) FROM documents" style="width:800px!important"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit">
			</div>
		</form>
HERE;
}

function print_index($all_indexes)
{
    
    foreach ($all_indexes as $index) {
        $an_index = explode("##", $index);
        
        if ($an_index[0] != '') {
            echo "index " . $an_index[0] . "<br />{ <br />";
        } else {
            echo "<strong>you need a source name!</strong><br />";
        }
        
        if ($an_index[1] != '') {
            echo "source = " . $an_index[1] . "<br />";
        } else {
            echo "<strong>you need a source name!</strong><br />";
        }
        if ($an_index[2] != '') {
            echo "path = " . $an_index[2] . "<br />}<br />";
        } else {
            echo "<strong>you need a data directory path!</strong><br /> }";
        }
        echo "<br />";
    }
}

function print_source($sources, $type)
{
    
    //for each of the source strings, split it into an array on '##'
    foreach ($sources as $row) {
        $options = explode("##", $row);
        echo "source " . $options[0] . "<br /> { <br />";
        
        echo "type = " . $type . "<br />";
        
        if ($options[1] != '') {
            echo "sql_host = " . $options[1] . "<br />";
        } else {
            echo "<strong>you need sql_host!</strong><br />";
        }
        if ($options[2] != '') {
            echo "sql_port = " . $options[2] . "<br />";
        } else {
            echo "<strong>you need sql_port!</strong><br />";
        }
        if ($options[3] != '') {
            echo "sql_user = " . $options[3] . "<br />";
        } else {
            echo "<strong>you need sql_user!</strong><br />";
        }
        if ($options[4] != '') {
            echo "sql_pass = " . $options[4] . "<br />";
        }
        if ($options[5] != '') {
            echo "sql_db = " . $options[5] . "<br />";
        } else {
            echo "<strong>you need db name!</strong><br />";
        }
        if ($options[6] != '') {
            echo "sql_sock = " . $options[6] . "<br />";
        }
        if ($options[7] != '') {
            echo "mysql_connect_flags = " . $options[7] . "<br />";
        }
        if ($options[8] != '') {
            echo "mysql_ssl_cert = " . $options[8] . "<br />";
        }
        if ($options[9] != '') {
            echo "mysql_ssl_key = " . $options[9] . "<br />";
        }
        if ($options[10] != '') {
            echo "mysql_ssl_ca = " . $options[10] . "<br />";
        }
        if ($options[12] != '') {
            echo "sql_query = " . $options[12] . "<br />";
        } else {
            echo "<strong>you need the main query!</strong><br />";
        }
        if ($options[14] != '') {
            echo "sql_query_range = " . $options[14] . "<br />";
        }
        if ($options[13] != '') {
            echo "sql_joined_field = " . $options[13] . "<br />";
        }
        
        if ($options[11] != '') {
            //now, inside this loop, take the attributes string and split it by ','
            $final_attributes = explode(",", $options[11]);
            foreach ($final_attributes as $attr) {
                echo $attr . "<br />";
            }
            //end if
        }
        //end config block
        echo "} <br /><br />";
        //end foreach
    }
}

function print_searchd($searchd_string)
{
    
    $searchd_options = explode("##", $searchd_string);
    echo "searchd<br /> { <br />";
    if ($searchd_options[0] != '') {
        $final_listen = explode(",", $searchd_options[0]);
        foreach ($final_listen as $list) {
            echo "listen = " . $list . "<br />";
        }
    } else {
        echo "<strong>you need to tell sphinx where and how to listen!</strong><br />";
    }
    if ($searchd_options[1] != '') {
        echo "log = " . $searchd_options[1] . "<br />";
    } else {
        echo "<strong>you need to tell sphinx where to put searchd log files!</strong><br />";
    }
    if ($searchd_options[2] != '') {
        echo "query_log = " . $searchd_options[2] . "<br />";
    } else {
        echo "<strong>you need to tell sphinx where and how to listen!</strong><br />";
    }
    if ($searchd_options[3] != '') {
        echo "pid_file = " . $searchd_options[3] . "<br />";
    } else {
        echo "<strong>you need to tell sphinx where to put the PID file!</strong><br />";
    }
    echo "}<br />";
}

function print_searchd_form()
{
    //get searchd config options, send them to searchd.php
    echo <<<HERE
		<h3>Searchd Options</h3>
		<form role='form' name='index' action='review.php' method='post'>
			<div class='form-group'>
				<label for='listen'><a href='http://sphinxsearch.com/docs/current.html#conf-listen'>Where (and how) to listen (mandatory)</a></label><br />
				<textarea  style="width:800px!important" name='listen' placeholder='separate them with a comma! localhost:9306:mysql41, 127.0.0.1:9306:mysqli41, 9306, etc...'></textarea>
			</div>
			<div class='form-group'>
				<label for='log'><a href='http://sphinxsearch.com/docs/current.html#conf-log'>Where to log searchd runtime events (mandatory)</a></label><br />
				<input type='text' name='log' placeholder='/var/log/searchd.log'>
			</div>
			<div class='form-group'>
				<label for='query_log'><a href='http://sphinxsearch.com/docs/current.html#conf-query-log'>Where to log queries (mandatory)</a></label><br />
				<input type='text' name='query_log' placeholder='/var/log/query.log'>
			</div>
			<div class='form-group'>
				<label for='pid'><a href='http://sphinxsearch.com/docs/current.html#conf-pid-file'>Where to put the PID (mandatory)</a></label><br />
				<input type='text' name='pid' placeholder='/var/run/searchd.pid'>
			</div>
			<div class='form-group'>
				<input type='submit' value='Submit'>
			</div>
HERE;
}

function print_header()
{
    echo <<<HERE
<!DOCTYPE html>
<html lang='en'>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no'>
<link href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
<link href='http://code.jquery.com/jquery-2.1.1.min.js'>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>


</head>

<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
   <div class="container">
     <div class="navbar-header">
       <a class="navbar-brand" href="#"><img src='1guysphinx.png'>&nbsp;&nbsp;sphinx.conf.maker</a>
     </div>
     <div class="navbar-collapse collapse">
       <ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
         <li><a href="index.php">Start</a></li>
         <li><a href="plainconfig.php">Add MySQL Source</a></li>
         <li><a href="index_options.php">Add Index</a></li>
         <li><a href="searchd_options.php">Searchd Options</a></li>
         <li><a href="final.php">Config (what you have so far)</a></li>
         <li><a href="about.php">About</a></li>
       </ul>
     </div><!--/.nav-collapse -->
   </div>
 </div>
HERE;
    
}
