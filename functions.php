<?php

//this will take searchd form information and return a concatenation seperated by ## (which will later be exploded)
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
    
    return $f_searchd_string;
}

//take index form info, concatenate separated by ##. because there will be many, if we haven't already,
//set session['index'] to array.
function &index_to_string($index_type)
{
    
    if (isset($_POST["index_name"])) {
        $f_index_string = $_POST["index_name"] . "##";
    }
    
    if (isset($_POST["index_source_name"])) {
        $f_index_string .= $_POST["index_source_name"] . "##";
    }
    
    if (isset($_POST["index_path"])) {
        $f_index_string .= $_POST["index_path"] . "##";
    }
    
    if (isset($_POST["docinfo"])) {
        $f_index_string .= $_POST["docinfo"] . "##";
    }
    
    if (isset($_POST["morphology"])) {
        $f_index_string .= $_POST["morphology"] . "##";
    }
    
    if (isset($_POST["index_sp"])) {
        $f_index_string .= $_POST["index_sp"] . "##";
    }
    
    if (isset($_POST["index_zones"])) {
        $f_index_string .= $_POST["index_zones"] . "##";
    }
    
    if (isset($_POST["html_strip"])) {
        $f_index_string .= $_POST["html_strip"] . "##";
    }
    
    if (isset($_POST["min_stemming_len"])) {
        $f_index_string .= $_POST["min_stemming_len"] . "##";
    }
    
    if (isset($_POST["stopwords"])) {
        $f_index_string .= $_POST["stopwords"] . "##";
    }
    
    if (isset($_POST["wordforms"])) {
        $f_index_string .= $_POST["wordforms"] . "##";
    }
    
    if (isset($_POST["embedded_limit"])) {
        $f_index_string .= $_POST["embedded_limit"] . "##";
    }
    
    if (isset($_POST["exceptions"])) {
        $f_index_string .= $_POST["exceptions"] . "##";
    }
    
    if (!isset($_SESSION['index'])) {
        $_SESSION['index'] = array();
    }
    
    $f_index_string .= $index_type . "##";
    
    return $f_index_string;
}

//source form information concatenated, set session['source'] to array
function &source_to_string()
{
#1    
    if (!empty($_POST['source_name'])) {
        $f_source_string = $_POST['source_name'] . "##";
    } else { $f_source_string = "*##"; }
#2    
    if (!empty($_POST['sql_host'])) {
        $f_source_string .= $_POST['sql_host'] . "##";
    } else { $f_source_string .= "*##"; }
#3    
    if (!empty($_POST['sql_port'])) {
        $f_source_string .= $_POST['sql_port'] . "##";
    } else { $f_source_string .= "*##"; }
#4    
    if (!empty($_POST['sql_user'])) {
        $f_source_string .= $_POST['sql_user'] . "##";
    } else { $f_source_string .= "*##"; }
#5    
    if (!empty($_POST['sql_pass'])) {
        $f_source_string .= $_POST['sql_pass'] . "##";
    } else { $f_source_string .= "*##"; }
#6    
    if (!empty($_POST['sql_db'])) {
        $f_source_string .= $_POST['sql_db'] . "##";
    } else { $f_source_string .= "*##"; }
#7    
    if (!empty($_POST['sql_sock'])) {
        $f_source_string .= $_POST['sql_sock'] . "##";
    } else { $f_source_string .= "*##"; } 
#8    
    if (!empty($_POST['mysql_connect_flags'])) {
        $f_source_string .= $_POST['mysql_connect_flags'] . "##";
    } else { $f_source_string .= "*##"; }
#9    
    if (!empty($_POST['mysql_ssl_cert'])) {
        $f_source_string .= $_POST['mysql_ssl_cert'] . "##";
    } else { $f_source_string .= "*##"; } 
#10    
    if (!empty($_POST['mysql_ssl_key'])) {
        $f_source_string .= $_POST['mysql_ssl_key'] . "##";
    } else { $f_source_string .= "*##"; }
#11    
    if (!empty($_POST['mysql_ssl_ca'])) {
        $f_source_string .= $_POST['mysql_ssl_ca'] . "##";
    } else { $f_source_string .= "*##"; }
#12    
    if (!empty($_POST['attributes'])) {
        $f_source_string .= $_POST['attributes'] . "##";
    } else { $f_source_string .= "*##"; }
#13    
    if (!empty($_POST['sql_query'])) {
        $f_source_string .= $_POST['sql_query'] . "##";
    } else { $f_source_string .= "*##"; }
#14    
    if (!empty($_POST['sql_joined_field'])) {
        $f_source_string .= $_POST['sql_joined_field'] . "##";
    } else { $f_source_string .= "*##"; }
#15    
    if (!empty($_POST['sql_query_range'])) {
        $f_source_string .= $_POST['sql_query_range'] . "##";
    } else { $f_source_string .= "*##"; }
#16    
    if (!empty($_POST['mssql_winauth'])) {
        $f_source_string .= $_POST['mssql_winauth'] . "##";
    } else { $f_source_string .= "*##"; }
#17    
    if (!empty($_POST['sql_column_buffers'])) {
        $f_source_string .= $_POST['sql_column_buffers'] . "##";
    } else { $f_source_string .= "*##"; }
#18    
     if (!empty($_POST['odbc_dsn'])) {
        $f_source_string .= $_POST['odbc_dsn'] . "##";
    } else { $f_source_string .= "*##"; }
#19    
     if (!empty($_POST['source_type'])) {
        $f_source_string .= $_POST['source_type'] . "##";
    } else { $f_source_string .= "*##"; }
    
    //if the session source is not set, say 'its and array'.
    if (!isset($_SESSION["source"])) {
        $_SESSION["source"] = array();
    } 
    
    return $f_source_string;
}

//for use before print_blahblah();
function open_output()
{
    echo <<<HERE
<div class="row">
<div class="col-md-4">
HERE;
}

//for use after print_blahblah();
function close_output()
{
    echo <<<HERE
</div>
</div>
HERE;
}

//give this session['index_type']. it will print a form for that kind of index's options. links to docs.
function print_index_form($index_type)
{
if($index_type == 'plain'){
    echo <<<HERE
	<div class="col-md-4" style="background-color:#FAFAFA">
		<h3>make an index</h3>
		<p class='help-block'>If you chose to make a scripted configuration, go ahead and do your
			magic in these fields below. Use environment variables, do things with PHP, etc..</p>
		<h4 style="margin-top:50px">Required options:</h4>
		<form role='form' name='index' action='searchd_options.php' method='post'>
			<div class='form-group'>
					<label for='index_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
					Name this Index (mandatory)</a></label><br />
					<p class='help-block'>Inherit options from other indexes! Just add
					a ':' followed by the name of the index to inherit from.</p>
					<input type='text' name='index_name' placeholder='test_index'>
					
			</div>
			<div class='form-group'>
					<input type='hidden' name='index_type' value="$index_type">
			</div>
			<div class='form-group'>
					<label for='index_source_name'><a href='http://sphinxsearch.com/docs/current.html#conf-sql-host'>Choose Source Name (mandatory)</a></label><br />
					<input type='text' name='index_source_name' placeholder='src1'>
			</div>
			<div class='form-group'>
					<label for='index_path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
					<input type='text' name='index_path' placeholder='/var/data/test'>
			</div>
		<h4 style="margin-top:50px">All other options</h4>
			<div class='form-group'>
					<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a></label><br />
					<input type='text' name='docinfo' placeholder='none, extern, or inline'>
			</div>
			<div class='form-group'>
					<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a></label><br />
					<textarea type='text' name='morphology' placeholder='Comma separated list. Like this: stem_en, libstemmer_sv' style="width:350px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a></label><br />
					<input type='text' name='index_sp' placeholder='1 or 0. 0 is default.'>
			</div>
			<div class='form-group'>
					<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper (other options need this..)</a></label><br />
					<input type='text' name='html_strip' placeholder='1 or 0. 0 is default.'>
			</div>
			<div class='form-group'>
					<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a></label><br />
					<textarea type='text' name='index_zones' placeholder='A comma separated list of in-field HTML/XML zones to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:350px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a></label><br />
					<input type='text' name='min_stemming_len' placeholder='4'">
			</div>
			<div class='form-group'>
					<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a></label><br />
					<textarea type='text' name='stopwords' placeholder='"/usr/local/sphinx/data/stopwords.txt" or "stopwords-ru.txt stopwords-en.txt"' style="width:350px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a></label><br />
					<input type='text' name='wordforms' placeholder='/usr/local/sphinx/data/wordforms.txt' style="width:350px!important">
			</div>
			<div class='form-group'>
					<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a></label><br />
					<input type='text' name='embedded_limit' placeholder='32K'">
			</div>
			<div class='form-group'>
					<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a></label><br />
					<input type='text' name='exceptions' placeholder='/usr/local/sphinx/data/exceptions.txt' style="width:350px!important">
			</div>
		
			<div class='form-group'>
				<input type='submit' value='Submit'>
			</div>
		</form>
	</div>
HERE;
	}
}

//this will print that big ugly source options form.. and links to docs! reformat this!!
function print_source_form($source_type)
{
    echo <<<HERE
<form role="form" name="host" action="index_options.php" method="post">
			<div class='form-group'>
					<input type='hidden' name='source_type' value="$source_type">
			</div>
			<div class="form-group">
				<label for="source_name"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Source Name (mandatory)</a></label><br />
				<p class='help-block'>Inherit options from other sources! Just add
					a ':' followed by the name of the source to inherit from.</p>
				<input type="text" name="source_name" placeholder="src1"></textarea>
				
			</div>
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
			<div class="form-group">
				<label for="sql_query"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query">Main Query (mandatory)</a></label><br />
				<textarea name="sql_query" placeholder="SELECT id, group_id, UNIX_TIMESTAMP(date_added) AS date_added, title, content FROM documents"  style="width:350px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="attributes"><a href="http://sphinxsearch.com/docs/current.html#attributes">Attributes</a> <br /></label><br />
				<textarea name="attributes" rows="4" placeholder="Comma separated! Like this: sql_attr_uint=something, sql_attr_json=something, etc..." style="width:350px!important"></textarea>
			</div>
HERE;

//if it's an odbc, print these:
if($_SESSION['source_type'] == 'odbc'){
	echo <<<HERE
	<div class="form-group">	
						<label for="odbc_dsn"><a href="http://sphinxsearch.com/docs/current.html#conf-odbc-dsn">ODBC DSN</a></label><br />
						<input type="text" name="odbc_dsn" placeholder="1 # use currently logged on user credentials"> 
					</div>
	<div class="form-group">	
						<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a></label><br />
						<input type="text" name="sql_column_buffers" placeholder="content=12M, comments=1M"> 
					</div>
HERE;
	}

//if it's a mssqlsource, print these:
if($_SESSION['source_type'] == 'mssql'){
	echo <<<HERE
	<div class="form-group">	
						<label for="mssql_winauth"><a href="http://sphinxsearch.com/docs/current.html#conf-mssql-winauth">Windows Authorization</a></label><br />
						<input type="text" name="mssql_winauth" placeholder="1 # use currently logged on user credentials"> 
					</div>
	<div class="form-group">	
						<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a></label><br />
						<input type="text" name="sql_column_buffers" placeholder="content=12M, comments=1M"> 
					</div>
				
HERE;
	}

echo <<<HERE
			<div class="form-group">	
				<label for="sql_sock"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-sock">UNIX Socket Name</a></label><br />
				<input type="text" name="sql_sock" placeholder="/tmp/mysql.sock">
			</div>
HERE;

//if it's a mysql source, print these:
if($_SESSION['source_type'] == 'mysql'){
echo <<<HERE
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
HERE;

}

echo <<<HERE
			<div class="form-group">
				<label for="sql_joined_field"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-joined-field">Joined Field(s)</a></label><br />
				<textarea name="sql_joined_field" type="text" placeholder="tagstext from query; SELECT docid, CONCAT('tag',tagid) FROM tags ORDER BY docid ASC" style="width:350px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="sql_query_range"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query-range">Ranged Query</a></label><br />
				<textarea type="text" name="sql_query_range" placeholder="SELECT MIN(id),MAX(id) FROM documents" style="width:350px!important"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit">
			</div>
		</form>
HERE;
}

//print all the indexes by giving this function $_SESSION['index']. if mandatory options are missing, tell the user!
//this way, they can choose to not enter any info, then they'll have a reminder to switch it later on.
function print_index($all_indexes)
{
    
    foreach ($all_indexes as $index) {
        $an_index = explode("##", $index);
        
        if ($an_index[0] != '') {
            echo "index " . $an_index[0] . "\n<br />{ \n<br />";
        } else {
            echo "<strong>you need a source name!</strong><br />";
        }
        
        if ($an_index[13] != '') {
            echo "type = " . $an_index[13] . "\n<br />";
        } else {
            echo "<strong>you need an index type!</strong><br />";
        }
        
        if ($an_index[1] != '') {
            echo "source = " . $an_index[1] . "\n<br />";
        } else {
            echo "<strong>you need a source name!</strong>\n<br />";
        }
        if ($an_index[2] != '') {
            echo "path = " . $an_index[2] . "\n<br />";
        } else {
            echo "<strong>you need a data directory path!</strong>\n<br />";
        }
        
        if ($an_index[3] != '') {
            echo "docinfo = " . $an_index[3] . "\n<br />";
        }
        
        if ($an_index[4] != '') {
            echo "morphology = " . $an_index[4] . "\n<br />";
        }
        
        if ($an_index[5] != '') {
            echo "index_sp = " . $an_index[5] . "\n<br />";
        }
        
         if ($an_index[7] != '') {
            echo "html_strip = " . $an_index[7] . "\n<br />";
        }
        
        if ($an_index[6] != '') {
            echo "index_zones = " . $an_index[6] . "\n<br />";
        }
        
        if ($an_index[8] != '') {
            echo "min_stemming_len = " . $an_index[8] . "\n<br />";
        }
        
        if ($an_index[9] != '') {
            echo "stopwords = " . $an_index[9] . "\n<br />";
        }
        
        if ($an_index[10] != '') {
            echo "wordforms = " . $an_index[10] . "\n<br />";
        }
        
        if ($an_index[11] != '') {
            echo "embedded_limit = " . $an_index[11] . "\n<br />";
        }
        
        if ($an_index[12] != '') {
            echo "exceptions = " . $an_index[12] . "\n<br />";
        }
        
        echo "}\n<br />\n<br />";
    }
}

//give this function session['source'] and session['type'] and it will print all source blocks
//if mandatory options are missing, it will tell you.
function print_source($sources)
{
    
    //for each of the source strings, split it into an array on '##'
    foreach ($sources as $row) {
        $options = explode("##", $row);
   
        echo "source " . $options[0] . "\n<br /> { \n<br />";
        
        echo "type = " . $options[18] . "\n<br />";
        
        if($options[1] !== '*'){
            echo "sql_host = " . $options[1] . "\n<br />";
            }
        else {
            echo "<strong>you need sql_host!</strong>\n<br />";
        }
       
        if($options[2] !== '*'){
            echo "sql_port = " . $options[2] . "\n<br />";
            }
        else {
            echo "<strong>you need sql_port!</strong>\n<br />";
        }
       
        if($options[3] !== '*'){
            echo "sql_user = " . $options[3] . "\n<br />";
            }
        else {
            echo "<strong>you need sql_user!</strong>\n<br />";
        }
    
        if($options[4] !== '*'){
            echo "sql_pass = " . $options[4] . "\n<br />";
            }
        
        if($options[5] !== '*'){
            echo "sql_db = " . $options[5] . "\n<br />";
            }
        else {
            echo "<strong>you need db name!</strong>\n<br />";
        }

        if($options[6] !== '*'){
            echo "sql_sock = " . $options[6] . "\n<br />";
            }
           
        if($options[7] !== '*'){
            echo "mysql_connect_flags = " . $options[7] . "\n<br />";
            }
        
        if($options[8] !== '*'){
            echo "mysql_ssl_cert = " . $options[8] . "\n<br />";
            }
   
        		if($options[9] !== '*'){
            echo "mysql_ssl_key = " . $options[9] . "\n<br />";
            }
     
        if($options[10] !== '*'){
            echo "mysql_ssl_ca = " . $options[10] . "\n<br />";
            }
    
        if($options[12] !== '*'){
            echo "sql_query = " . $options[12] . "\n<br />";
            }
        else {
            echo "<strong>you need the main query!</strong>\n<br />";
            }
       
        if($options[14] !== '*'){
            echo "sql_query_range = " . $options[14] . "\n<br />";
            }

        if($options[13] !== '*'){
            echo "sql_joined_field = " . $options[13] . "\n<br />";
            }
      
        if($options[15] !== '*'){
            echo "mssql_winauth = " . $options[15] . "\n<br />";
            }
        
        if($options[16] !== '*'){
            echo "sql_column_buffers = " . $options[16] . "\n<br />";
            }
        
        if($options[17] !== '*'){
            echo "odbc_dsn = " . $options[17] . "\n<br />";
            }
     
        if($options[11] !== '*') {
            //now, inside this loop, take the attributes string and split it by ','
            $final_attributes = explode(",", $options[11]);
            foreach ($final_attributes as $attr) {
                echo $attr . "\n<br />";
            	}
            //end if
           }
        //end config block
        echo "} \n<br />\n<br />";
        //end foreach
    }
}

//searchd only takes one config block, so its not an array. when this function is run, the old settings are lost.
//give this function session['searchd']
function print_searchd($searchd_string)
{
    
    $searchd_options = explode("##", $searchd_string);
    echo "searchd<br /> { \n<br />";
    if ($searchd_options[0] != '') {
        $final_listen = explode(",", $searchd_options[0]);
        foreach ($final_listen as $list) {
            echo "listen = " . $list . "\n<br />";
        }
    } else {
        echo "<strong>you need to tell sphinx where and how to listen!</strong>\n<br />";
    }
    if ($searchd_options[1] != '') {
        echo "log = " . $searchd_options[1] . "\n<br />";
    } else {
        echo "<strong>you need to tell sphinx where to put searchd log files!</strong>\n<br />";
    }
    if ($searchd_options[2] != '') {
        echo "query_log = " . $searchd_options[2] . "\n<br />";
    } else {
        echo "<strong>you need to tell sphinx where and how to listen!</strong>\n<br />";
    }
    if ($searchd_options[3] != '') {
        echo "pid_file = " . $searchd_options[3] . "\n<br />";
    } else {
        echo "<strong>you need to tell sphinx where to put the PID file!</strong>\n<br />";
    }
    echo "}\n<br />";
}


//print the form for searchd options, which sends users to review.php
function print_searchd_form()
{
    echo <<<HERE
		<h3>Searchd Options</h3>
		<p class="help-block">If you've already defined this, redefining will override your old settings.</p>
		<form role='form' name='index' action='review.php' method='post'>
			<div class='form-group'>
				<label for='listen'><a href='http://sphinxsearch.com/docs/current.html#conf-listen'>Where (and how) to listen (mandatory)</a></label><br />
				<textarea style="width:350px!important" name='listen' placeholder='separate them with a comma! localhost:9306:mysql41, 127.0.0.1:9306:mysqli41, 9306, etc...'></textarea>
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

//html for usual header
function print_header()
{
    echo <<<HERE
<!DOCTYPE html>
<html lang='en'>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no'>
<link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
<script src="http://code.jquery.com/jquery.js"></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<style>
.navbar-default {
    background-color: #FFF;
    border-color: #E7E7E7;
}
</style>

</head>

<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
   <div class="container">
     <div class="navbar-header">
       <a class="navbar-brand" href="#"><img src='http://stevenjbarker.comoj.com/1guysphinx.png'>&nbsp;&nbsp;sphinx.conf maker</a>
     </div>
     <div class="navbar-collapse">
       <ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
         <li><a href="index.php">Start</a></li>
        	<li class="dropdown">
				 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					  Sources 
					  <span class="caret"></span>
				 </a>
				 <!--if they click these links, it will send them to index or source and specify 'MySQL' type-->
				 <ul class="dropdown-menu" role="menu">
					  <li><a href="plainconfig.php?source_type=mysql">Add MySQL Source</a></li>
					  <li><a href="plainconfig.php?source_type=pgsql">Add PostgreSQL Source</a></li>
					  <li><a href="plainconfig.php?source_type=mssql">Add MSSQL Source</a></li>
					  <li><a href="plainconfig.php?source_type=xmlpipe2">Add XML Source</a></li>
					  <li><a href="plainconfig.php?source_type=tsvpipe">Add TSV Source</a></li>
					  <li><a href="plainconfig.php?source_type=odbc">Add ODBC Source</a></li>
				 </ul>
			</li>
			<li class="dropdown">
				 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					  Indexes 
					  <span class="caret"></span>
				 </a>
				 <!--if they click these links, it will send them to index or source and specify 'PostgreSQL' type-->
				 <ul class="dropdown-menu" role="menu">
					  <li><a href="index_options.php?index_type=plain">Regular Index</a></li>
					  
				 </ul>
			</li>
				<li><a href="searchd_options.php">(re)Set Searchd Options</a></li>
				
				
				<li><a href="final.php">Config (what you have so far)</a></li>
				<li><a href="about.php">About</a></li>
			 </ul>
			</li>
     </div><!--/.nav-collapse -->
   </div>
 </div>
HERE;
    
}

//html for final header
function print_final_header()
{
    echo <<<HERE
<!DOCTYPE html>
<html lang='en'>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no'>
<link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
<script src="http://code.jquery.com/jquery.js"></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<style>
.navbar-default {
    background-color: #FFF;
    border-color: #E7E7E7;
}
</style>
<script type="text/javascript" src="http://www.steamdev.com/zclip/js/jquery.zclip.min.js"></script>
<script type="text/javascript" src="http://www.steamdev.com/zclip/js/jquery.snippet.min.js"></script>
</head>

<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
   <div class="container">
     <div class="navbar-header">
       <a class="navbar-brand" href="#"><img src='http://stevenjbarker.comoj.com/1guysphinx.png'>&nbsp;&nbsp;sphinx.conf maker</a>
     </div>
     <div class="navbar-collapse">
       <ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
         <li><a href="index.php">Start</a></li>
        	<li class="dropdown">
				 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					  Sources 
					  <span class="caret"></span>
				 </a>
				 <!--if they click these links, it will send them to index or source and specify 'MySQL' type-->
				 <ul class="dropdown-menu" role="menu">
					  <li><a href="plainconfig.php?source_type=mysql">Add MySQL Source</a></li>
					  <li><a href="plainconfig.php?source_type=pgsql">Add PostgreSQL Source</a></li>
					  <li><a href="plainconfig.php?source_type=mssql">Add MSSQL Source</a></li>
					  <li><a href="plainconfig.php?source_type=xmlpipe2">Add XML Source</a></li>
					  <li><a href="plainconfig.php?source_type=tsvpipe">Add TSV Source</a></li>
					  <li><a href="plainconfig.php?source_type=odbc">Add ODBC Source</a></li>
				 </ul>
			</li>
			<li><a href="searchd_options.php">(re)Set Searchd Options</a></li>
			<li class="dropdown">
				 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					  Indexes 
					  <span class="caret"></span>
				 </a>
				 <!--if they click these links, it will send them to index or source and specify 'PostgreSQL' type-->
				 <ul class="dropdown-menu" role="menu">
					  <li><a href="index_options.php?index_type=plain">Regular Index</a></li>
					  
				 </ul>
			</li>
			
			<li><a href="final.php">Config (what you have so far)</a></li>
			<li><a href="about.php">About</a></li>
		 </ul>
		</li>
     </div><!--/.nav-collapse -->
   </div>
 </div>
HERE;
    
}

//another header for the home page so that users don't have all the options (because they don't make sense yet..)
function print_home_header()
{
    echo <<<HERE
<!DOCTYPE html>
<html lang='en'>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no'>
<link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
<script src="http://code.jquery.com/jquery.js"></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>

</head>
<style>
.navbar-default {
    background-color: #FFF;
    border-color: #E7E7E7;
}
</style>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
   <div class="container">
     <div class="navbar-header">
       <a class="navbar-brand" href="#"><img src='http://stevenjbarker.comoj.com/1guysphinx.png'>&nbsp;&nbsp;sphinx.conf maker</a>
     </div>
     <div class="navbar-collapse collapse">
       <ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
         <li><a href="about.php">About</a></li>
       </ul>
     </div><!--/.nav-collapse -->
   </div>
 </div>
HERE;
    
}
