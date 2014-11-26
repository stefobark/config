<?php

//----------------------------|
//------ INDEX SETTINGS ------|
//----------------------------|


// add index form info to this array and return it
function process_index($index_type)
{
    
    if ($index_type == 'distributed') {
        
        if (!isset($_SESSION['index'])) {
            $_SESSION['index'] = array();
        }
        
        if (isset($_POST["index_name"])) {
            $f_index["index_name"] = $_POST["index_name"];
        }
        
        if (isset($_POST["agent"])) {
            $f_index["agent"] = $_POST["agent"];
        }
        
        if (isset($_POST["agent_blackhole"])) {
            $f_index["agent_blackhole"] = $_POST["agent_blackhole"];
        }
        
        if (isset($_POST["agent_connect_timeout"])) {
            $f_index["agent_connect_timeout"] = $_POST["agent_connect_timeout"];
        }
        
        if (isset($_POST["agent_persistent"])) {
            $f_index["agent_persistent"] = $_POST["agent_persistent"];
        }
        
        if (isset($_POST["agent_query_timeout"])) {
            $f_index["agent_query_timeout"] = $_POST["agent_query_timeout"];
        }
        
        if (isset($_POST["ha_strategy"])) {
            $f_index["ha_strategy"] = $_POST["ha_strategy"];
        }
        
        if (isset($_POST["ha_ping_interval"])) {
            $f_index["ha_ping_interval"] = $_POST["ha_ping_interval"];
        }
        
        if (isset($_POST["ha_period_karma"])) {
            $f_index["ha_period_karma"] = $_POST["ha_period_karma"];
        }
        
        if (isset($index_type)) {
            $f_index["index_type"] = $_POST['index_type'];
        }
        
        return $f_index;
    }
    
    if ($index_type == 'plain' | $index_type == 'template') {
        
        if (!isset($_SESSION['index'])) {
            $_SESSION['index'] = array();
        }
        
        if (isset($_POST["index_name"])) {
            $f_index["index_name"] = $_POST["index_name"];
        }
        
        if (isset($_POST["index_source_name"])) {
            $f_index["index_source_name"] = $_POST["index_source_name"];
        }
        
        if (isset($_POST["index_path"])) {
            $f_index["index_path"] = $_POST["index_path"];
        }
        
        if (isset($_POST["docinfo"])) {
            $f_index["docinfo"] = $_POST["docinfo"];
        }
        
        if (isset($_POST["morphology"])) {
            $f_index["morphology"] = $_POST["morphology"];
        }
        
        if (isset($_POST["index_sp"])) {
            $f_index["index_sp"] = $_POST["index_sp"];
        }
        
        if (isset($_POST["index_zones"])) {
            $f_index["index_zones"] = $_POST["index_zones"];
        }
        
        if (isset($_POST["html_strip"])) {
            $f_index["html_strip"] = $_POST["html_strip"];
        }
        
        if (isset($_POST["min_stemming_len"])) {
            $f_index["min_stemming_len"] = $_POST["min_stemming_len"];
        }
        
        if (isset($_POST["stopwords"])) {
            $f_index["stopwords"] = $_POST["stopwords"];
        }
        
        if (isset($_POST["wordforms"])) {
            $f_index["wordforms"] = $_POST["wordforms"];
        }
        
        if (isset($_POST["embedded_limit"])) {
            $f_index["embedded_limit"] = $_POST["embedded_limit"];
        }
        
        if (isset($_POST["exceptions"])) {
            $f_index["exceptions"] = $_POST["exceptions"];
        }
        
        if (isset($index_type)) {
            $f_index["index_type"] = $_SESSION['index_type'];
        }
        
        if (isset($_POST["html_index_attrs"])) {
            $f_index["html_index_attrs"] = $_POST["html_index_attrs"];
        }
        
        return $f_index;
    }
    if ($index_type == 'rt') {
        
        if (!isset($_SESSION['index'])) {
            $_SESSION['index'] = array();
        }
        
        if (isset($_POST["index_name"])) {
            $f_index["index_name"] = $_POST["index_name"];
        }
        
        if (isset($_POST["index_path"])) {
            $f_index["index_path"] = $_POST["index_path"];
        }
        
        if (isset($_POST["rt_field"])) {
            $f_index["rt_field"] = $_POST["rt_field"];
        }
        
        if (isset($_POST["rt_attr"])) {
            $f_index["rt_attr"] = $_POST["rt_attr"];
        }
        
        if (isset($_POST["docinfo"])) {
            $f_index["docinfo"] = $_POST["docinfo"];
        }
        
        if (isset($_POST["morphology"])) {
            $f_index["morphology"] = $_POST["morphology"];
        }
        
        if (isset($_POST["index_sp"])) {
            $f_index["index_sp"] = $_POST["index_sp"];
        }
        
        if (isset($_POST["index_zones"])) {
            $f_index["index_zones"] = $_POST["index_zones"];
        }
        
        if (isset($_POST["html_strip"])) {
            $f_index["html_strip"] = $_POST["html_strip"];
        }
        
        if (isset($_POST["min_stemming_len"])) {
            $f_index["min_stemming_len"] = $_POST["min_stemming_len"];
        }
        
        if (isset($_POST["stopwords"])) {
            $f_index["stopwords"] = $_POST["stopwords"];
        }
        
        if (isset($_POST["wordforms"])) {
            $f_index["wordforms"] = $_POST["wordforms"];
        }
        
        if (isset($_POST["embedded_limit"])) {
            $f_index["embedded_limit"] = $_POST["embedded_limit"];
        }
        
        if (isset($_POST["exceptions"])) {
            $f_index["exceptions"] = $_POST["exceptions"];
        }
        
        if (isset($index_type)) {
            $f_index["index_type"] = $_SESSION['index_type'];
        }
        
        if (isset($_POST["html_index_attrs"])) {
            $f_index["html_index_attrs"] = $_POST["html_index_attrs"];
        }
        
        return $f_index;
    }
    
}

//give this session['index_type']. it will print a form for that kind of index's options. links to docs.
function print_index_form($index_type)
{
	if ($index_type == 'distributed' ) {
        echo <<<HERE
        <div class="col-md-4">
        		<h3 class="text-center">make a distributed index</h3>
					<div id="accordion" class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mandatory Options</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
							<form role='form' name='index' action='searchd_options.php' method='post'>
								<div class='form-group'>
									<label for='index_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
									Name this Index (mandatory)</a></label><br />
									<p class='help-block'>Inherit options from other indexes, just add
									a ':' after the index name followed by the name of the index to inherit from.</p>
									<input type='text' name='index_name' placeholder='test_index'>
								</div>
								<div class='form-group'>
									<input type='hidden' name='index_type' value="$index_type">
								</div>
								<div class='form-group'>
										<label for='agent'><a href='http://sphinxsearch.com/docs/current.html#conf-agent'>
										Sphinx Nodes</a></label><br />
										<p class='help-block'>This is where you point out the remote agents. If there are mirrors, declare them in one line separated by "|"</p>
										<textarea name='agent' placeholder='127.0.0.1:9306|127.0.0.1:9307:rt_test'  style="width:300px!important"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Agent Settings</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<div class='form-group'>
										<label for='agent_persistent'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-persistent'>
										Persistent connections to remote agents</a></label><br />
										<p class='help-block'>agent_persistent directive syntax matches that of the agent directive. The only difference is that the master will not open a new connection to the agent for every query and then close it. Rather, it will keep a connection open and attempt to reuse for the subsequent queries. The maximal number of such persistent connections per one agent host is limited by persistent_connections_limit option of searchd section.</p>
										<textarea name='agent_persistent' placeholder='127.0.0.1:9306|127.0.0.1:9307:rt_test'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_blackhole'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-blackhole'>
										Agent blackhole: fire and forget</a></label><br />
										<p class='help-block'>agent_blackhole lets you fire-and-forget queries to remote agents. That is useful for debugging (or just testing) production clusters: you can setup a separate debugging/testing searchd instance, and forward the requests to this instance from your production master (aggregator) instance without interfering with production work. Master searchd will attempt to connect and query blackhole agent normally, but it will neither wait nor process any responses. Also, all network errors on blackhole agents will be ignored. The value format is completely identical to regular agent directive.</p>
										<textarea name='agent_blackhole' placeholder='127.0.0.1:9306|127.0.0.1:9307:rt_test'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_connect_timeout'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-connect-timeout'>
										Connection timeout</a></label><br />
										<p class='help-block'>When connecting to remote agents, searchd will wait at most this much time for connect() call to complete successfully. If the timeout is reached but connect() does not complete, and retries are enabled, retry will be initiated.</p>
										<textarea name='agent_connect_timeout' placeholder='300'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_query_timeout'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-query-timeout'>
										Agent query timeout</a></label><br />
										<p class='help-block'>After connection, searchd will wait at most this much time for remote queries to complete. This timeout is fully separate from connection timeout; so the maximum possible delay caused by a remote agent equals to the sum of agent_connection_timeout and agent_query_timeout. Queries will not be retried if this timeout is reached; a warning will be produced instead.</p>
										<textarea name='agent_query_timeout' placeholder='10000'  style="width:300px!important"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Agent Mirror Options (HA / Failover)</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
								<div class='form-group'>
										<label for='ha_strategy'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-strategy'>
										Agent mirror selection strategy, for load balancing.</a></label><br />
										<p class='help-block'>The strategy used for mirror selection, or in other words, choosing a specific agent mirror in a distributed index. Essentially, this directive controls how exactly master does the load balancing between the configured mirror agent nodes.</p>
										<textarea name='ha_strategy' placeholder='nodeads'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='ha_period_karma'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-period-karma'>
										Agent mirror statistics window size, in seconds.</a></label><br />
										<p class='help-block'>For a distributed index with agent mirrors, the master node tracks several different per-mirror counters. These counters are then used for failover and balancing (the master picks the best mirror to use based on the counters.) Counters are accumulated in blocks of ha_period_karma seconds.</p>
										<textarea name='ha_period_karma' placeholder='120'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='ha_ping_interval'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-period-karma'>
										Interval between agent mirror pings, in milliseconds.</a></label><br />
										<p class='help-block'>For a distributed index with agent mirrors in it, master sends all mirrors a ping command during the idle periods. This is to track the current agent status (alive or dead, network roundtrip, etc). The interval between such pings is defined by this directive.</p>
										<textarea name='ha_ping_interval' placeholder='1000'  style="width:300px!important"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class='form-group'>
						<br/><input type='submit' value='Submit'>
					</div>
					</form>
				</div>
			</div>
HERE;
}
    if ($index_type == 'plain' ) {
        echo <<<HERE
	<div class="col-md-4">
		<h3 class="text-center">make an index</h3>
		<div id="accordion" class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mandatory Options</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse">
				<div class="panel-body">
					<form role='form' name='index' action='searchd_options.php' method='post'>
					<div class='form-group'>
							<label for='index_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
							Name this Index (mandatory)</a></label><br />
							<p class='help-block'>Inherit options from other indexes, just add
							a ':' after the index name followed by the name of the index to inherit from.</p>
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
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Attributes</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
						<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a></label><br />
						<p class='help-block'>This defines how attributes will be stored on disk and RAM. "none" means that there will be no attributes. Sphinx will use 'none' if you don't set any attributes. "inline" means that attributes will be stored in the .spd file, along with the document ID lists. "extern" means that the docinfo (attributes) will be stored separately (externally) from document ID lists, in a special .spa file. </p>
						<input type='text' name='docinfo' placeholder='none, extern, or inline'>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">HTML-Related Options</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
							<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a></label><br />
							<p class='help-block'>This directive enables sentence and paragraph boundary indexing. It's required for the SENTENCE and PARAGRAPH operators to work. Sentence boundary detection is based on plain text analysis, so you only need to set index_sp = 1 to enable it. Paragraph detection is however based on HTML markup, and happens in the HTML stripper. So to index paragraph locations you also need to enable the stripper by specifying html_strip = 1. Both types of boundaries are detected based on a few built-in rules which you can learn more about by following the link on this section's title. </p>
							<input type='text' name='index_sp' placeholder='1 or 0. 0 is default.'>
					</div>
					<div class='form-group'>
							<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper (other options need this..)</a></label><br />
							<p class='help-block'>Whether to strip HTML markup from incoming full-text data. HTML tags are removed, their contents are left intact by default. You can choose to keep and index attributes of the tags (e.g., HREF attribute in an A tag, or ALT in an IMG one) with the next option ('html_index_attrs').</p> 
							<input type='text' name='html_strip' placeholder='1 or 0. 0 is default.'>
					</div>
					<div class='form-group'>
							<label for='html_index_attrs'><a href='http://sphinxsearch.com/docs/current.html#conf-html-index-attrs'>HTML/XML tags to index</a></label><br />
							<p class='help-block'>Specifies HTML markup attributes whose contents should be retained and indexed even though other HTML markup is stripped. The format is per-tag enumeration of indexable attributes, as shown in the example below. </p>
							<textarea type='text' name='html_index_attrs' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a></label><br />
							<p class='help-block'>Zones can be formally defined as follows. Everything between an opening and a matching closing tag is called a span, and the aggregate of all spans sharing the same tag name is a zone. For instance, everything between the occurrences of H1 and /H1 in the document field belongs to the H1 zone. In short, use this to enable the ZONE search operator!</p>
							<textarea type='text' name='index_zones' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Text Processing Options</a>
				</h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
									<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a></label><br />
									<p class='help-block'> These can used, while indexing, to replace different forms of the same word with their normalized form. For instance, The English stemmer will normalize both "dogs" and "dog" to "dog", making search results for both searches the same. Sphinx supports lemmatizers, stemmers, and phonetic algorithms. </p>
									<textarea type='text' name='morphology' placeholder='Comma separated list. Like this: stem_en, libstemmer_sv' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a></label><br />
												<p class="help-block">Stemmers are not perfect, and might sometimes produce undesired results. For instance, running "gps" keyword through Porter stemmer for English results in "gp", which is not really the intent. min_stemming_len feature lets you suppress stemming based on the source word length, ie. to avoid stemming too short words. Keywords that are shorter than the given threshold will not be stemmed. Note that keywords that are exactly as long as specified will be stemmed. So in order to avoid stemming 3-character keywords, you should specify 4 for the value. For more finely grained control, refer to wordforms feature.</p>
							<input type='text' name='min_stemming_len' placeholder='4'">
					</div>
					<div class='form-group'>
							<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a></label><br />
							<p class="help-block">Stopwords are the words that will not be indexed. Typically you'd put most frequent words in the stopwords list because they do not add much value to search results but consume a lot of resources to process.</p>
							<textarea type='text' name='stopwords' placeholder='/usr/local/sphinx/data/stopwords.txt' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a></label><br />
							<p class='help-block'>Word forms are applied after tokenizing the incoming text by charset_table rules. They essentially let you replace one word with another. Normally, that would be used to bring different word forms to a single normal form (eg. to normalize all the variants such as "walks", "walked", "walking" to the normal form "walk"). It can also be used to implement stemming exceptions, because stemming is not applied to words found in the forms list.</p>
							<input type='text' name='wordforms' placeholder='/usr/local/sphinx/data/wordforms.txt' style="width:300px!important">
					</div>
					<div class='form-group'>
							<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a></label><br />
							<p class="help-block">Before 2.1.1-beta, the contents of exceptions, wordforms, or stopwords files were always kept in the files. Only the file names were stored into the index. Starting with 2.1.1-beta, indexer can either save the file name, or embed the file contents directly into the index. Files sized under embedded_limit get stored into the index. For bigger files, only the file names are stored. This also simplifies moving index files to a different machine; you may get by just copying a single file.</p>
							<input type='text' name='embedded_limit' placeholder='32K'">
					</div>
					<div class='form-group'>
							<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a></label><br />
							<p class="help-block">Exceptions allow to map one or more tokens (including tokens with characters that would normally be excluded) to a single keyword. They are similar to wordforms in that they also perform mapping, but have a number of important differences.</p>
							<input type='text' name='exceptions' placeholder='/usr/local/sphinx/data/exceptions.txt' style="width:300px!important">
					</div>
				</div>
			</div>
		</div>
		<div class='form-group'>
						<br/><input type='submit' value='Submit'>
		</div>
		</form>
	</div>
</div>

HERE;
    }
    
    if ($index_type == 'rt') {
        echo <<<HERE
	<div class="col-md-4" style="background-color:#FAFAFA">
		<h3>make an index</h3>
		<p class='help-block'>RealTime indexes are great! Just push data in, update it, search it. Awesome!</p>
		<form role='form' name='index' action='searchd_options.php' method='post'>
			<div class='form-group'>
				<label for='index_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
				Name this Index (mandatory)</a></label><br />
				<p class='help-block'>To inherit options from other indexes, just add
				a ':' after the index name followed by the name of the index to inherit from.</p>
				<input type='text' name='index_name' placeholder='test_index'>					
			</div>
			<div class='form-group'>
				<input type='hidden' name='index_type' value="$index_type">
			</div>
			<div class='form-group'>
				<label for='index_path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
				<input type='text' name='index_path' placeholder='/var/data/test'>
			</div>
			<div class='form-group'>
				<label for='rt_field'><a href='http://sphinxsearch.com/docs/current.html#conf-rt-field'>Full-text field declaration (mandatory)</a></label><br />
				<p class='help-block'>Full-text fields to be indexed are declared using rt_field directive. List all fields separated by a comma. The names must be unique. The order is preserved; and so field values in INSERT statements without an explicit list of inserted columns will have to be in the same order as configured.</p>
				<textarea type='text' name='rt_field' placeholder='rt_field = some_field, rt_field = some_other_field, etc..' style="width:300px!important"></textarea>
			</div>
			<div class='form-group'>
				<label for='rt_attr'><a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-uint'>RT attributes</a></label><br />
				<p class='help-block'>List all attributes (rt_attr_...) here, separated by a comma. Possible attributes types include: 
				<ul>
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-uint">rt_attr_uint (unsigned integer)</a></li>
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-bool">rt_attr_bool (boolean)</a></li>
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-bigint">rt_attr_bigint (big integer)</a></li>
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-float">rt_attr_float (floating point)</a></li> 
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-multi">rt_attr_multi (multi value attribute)</a></li> 
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-multi-64">rt_attr_multi_64</a></li>
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-timestamp">rt_attr_timestamp (unix timestamp)</a></li> 
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-string">rt_attr_string (string)</a></li> 
					<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-json">rt_attr_json (JSON)</a></li>
				</ul></p>				
				<textarea type='text' name='rt_attr' placeholder='rt_attr_uint = unsigned, rt_attr_json = json, etc..' style="width:300px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a></label><br />
					<p class='help-block'>This defines how attributes will be stored on disk and RAM. "none" means that there will be no attributes. Sphinx will use 'none' if you don't set any attributes. "inline" means that attributes will be stored in the .spd file, along with the document ID lists. "extern" means that the docinfo (attributes) will be stored separately (externally) from document ID lists, in a special .spa file. </p>
					<input type='text' name='docinfo' placeholder='none, extern, or inline'>
			</div>
			<div class='form-group'>
					<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a></label><br />
					<p class='help-block'> These can used, while indexing, to replace different forms of the same word with their normalized form. For instance, The English stemmer will normalize both "dogs" and "dog" to "dog", making search results for both searches the same. Sphinx supports lemmatizers, stemmers, and phonetic algorithms. </p>
					<textarea type='text' name='morphology' placeholder='Comma separated list. Like this: stem_en, libstemmer_sv' style="width:300px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a></label><br />
					<p class='help-block'>This directive enables sentence and paragraph boundary indexing. It's required for the SENTENCE and PARAGRAPH operators to work. Sentence boundary detection is based on plain text analysis, so you only need to set index_sp = 1 to enable it. Paragraph detection is however based on HTML markup, and happens in the HTML stripper. So to index paragraph locations you also need to enable the stripper by specifying html_strip = 1. Both types of boundaries are detected based on a few built-in rules which you can learn more about by following the link on this section's title. </p>
					<input type='text' name='index_sp' placeholder='1 or 0. 0 is default.'>
			</div>
			<div class='form-group'>
					<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper</a></label><br />
					<p class='help-block'>Whether to strip HTML markup from incoming full-text data. HTML tags are removed, their contents are left intact by default. You can choose to keep and index attributes of the tags (e.g., HREF attribute in an A tag, or ALT in an IMG one) with the next option ('html_index_attrs').</p> 
					<input type='text' name='html_strip' placeholder='1 or 0. 0 is default.'>
			</div>
			<div class='form-group'>
					<label for='html_index_attrs'><a href='http://sphinxsearch.com/docs/current.html#conf-html-index-attrs'>HTML/XML tags to index</a></label><br />
					<p class='help-block'>Specifies HTML markup attributes whose contents should be retained and indexed even though other HTML markup is stripped. The format is per-tag enumeration of indexable attributes, as shown in the example below. </p>
					<textarea type='text' name='html_index_attrs' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a></label><br />
					<p class='help-block'>Zones can be formally defined as follows. Everything between an opening and a matching closing tag is called a span, and the aggregate of all spans sharing the same tag name is a zone. For instance, everything between the occurrences of H1 and /H1 in the document field belongs to the H1 zone. In short, use this to enable the ZONE search operator!</p>
					<textarea type='text' name='index_zones' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a></label><br />
					<p class="help-block">Stemmers are not perfect, and might sometimes produce undesired results. For instance, running "gps" keyword through Porter stemmer for English results in "gp", which is not really the intent. min_stemming_len feature lets you suppress stemming based on the source word length, ie. to avoid stemming too short words. Keywords that are shorter than the given threshold will not be stemmed. Note that keywords that are exactly as long as specified will be stemmed. So in order to avoid stemming 3-character keywords, you should specify 4 for the value. For more finely grained control, refer to wordforms feature.</p>
					<input type='text' name='min_stemming_len' placeholder='4'">
			</div>
			<div class='form-group'>
					<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a></label><br />
										<p class="help-block">Stopwords are the words that will not be indexed. Typically you'd put most frequent words in the stopwords list because they do not add much value to search results but consume a lot of resources to process.</p>
					<textarea type='text' name='stopwords' placeholder='/usr/local/sphinx/data/stopwords.txt' style="width:300px!important"></textarea>
			</div>
			<div class='form-group'>
					<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a></label><br />
					<p class='help-block'>Word forms are applied after tokenizing the incoming text by charset_table rules. They essentially let you replace one word with another. Normally, that would be used to bring different word forms to a single normal form (eg. to normalize all the variants such as "walks", "walked", "walking" to the normal form "walk"). It can also be used to implement stemming exceptions, because stemming is not applied to words found in the forms list.</p>
					<input type='text' name='wordforms' placeholder='/usr/local/sphinx/data/wordforms.txt' style="width:300px!important">
			</div>
			<div class='form-group'>
					<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a></label><br />
					<p class="help-block">Before 2.1.1-beta, the contents of exceptions, wordforms, or stopwords files were always kept in the files. Only the file names were stored into the index. Starting with 2.1.1-beta, indexer can either save the file name, or embed the file contents directly into the index. Files sized under embedded_limit get stored into the index. For bigger files, only the file names are stored. This also simplifies moving index files to a different machine; you may get by just copying a single file.</p>
					<input type='text' name='embedded_limit' placeholder='32K'">
			</div>
			<div class='form-group'>
					<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a></label><br />
					<p class="help-block">Exceptions allow to map one or more tokens (including tokens with characters that would normally be excluded) to a single keyword. They are similar to wordforms in that they also perform mapping, but have a number of important differences.</p>
					<input type='text' name='exceptions' placeholder='/usr/local/sphinx/data/exceptions.txt' style="width:300px!important">
			</div>
			<div class='form-group'>
				<input type='submit' value='Submit'>
			</div>
		</form>
	</div>	
					
HERE;
    }
}

//print all the indexes by giving this function $_SESSION['index']. if mandatory options are missing, tell the user!
//this way, they can choose to not enter any info, then they'll have a reminder to switch it later on.
function print_index($all_indexes)
{

    foreach ($all_indexes as $index) {
        
        if (!empty($index["index_name"])) {
            echo "index " . $index["index_name"] . "\n<br />{ \n<br />";
        } else {
            echo "<strong>you need a source name!</strong><br />";
        }
        
        if (!empty($index["index_type"])) {
            echo "type = " . $index["index_type"] . "\n<br />";
        } else {
            echo "<strong>you need an index type!</strong><br />";
        }
        
        if ($index["index_type"] == 'plain') {
            
            if (!empty($index["index_source_name"])) {
                echo "source = " . $index['index_source_name'] . "\n<br />";
            } else {
                echo "<strong>#you didn't enter a source name</strong>\n<br />";
            }
        }
        
        if ($index["index_type"] == 'distributed') {
        
		      if (!empty($index["agent"])) {
		             echo "agent = " . $index['agent'] . "\n<br />";
		         } else {
		             echo "<strong>#you didn't enter any agents</strong>\n<br />";
		         }
		      
		      if (!empty($index["agent_blackhole"])) {
		             echo "agent_blackhole = " . $index['agent_blackhole'] . "\n<br />";
		         }
		      
		      if (!empty($index["agent_persistent"])) {
		             echo "agent_persistent = " . $index['agent_persistent'] . "\n<br />";
		         }
		      
		      if (!empty($index["agent_connect_timeout"])) {
		             echo "agent_connect_timeout = " . $index['agent_connect_timeout'] . "\n<br />";
		         }
		         
		       if (!empty($index["agent_query_timeout"])) {
		             echo "agent_query_timeout = " . $index['agent_query_timeout'] . "\n<br />";
		         }
		       
		       if (!empty($index["ha_strategy"])) {
		             echo "ha_strategy = " . $index['ha_strategy'] . "\n<br />";
		         }
		       
		       if (!empty($index["ha_period_karma"])) {
		             echo "ha_period_karma = " . $index['ha_period_karma'] . "\n<br />";
		         }
		       
		        if (!empty($index["ha_ping_interval"])) {
		             echo "ha_ping_interval = " . $index['ha_ping_interval'] . "\n<br />";
		         }    
        }
        if ($index["index_type"] == 'rt') {
            
            if (!empty($index["rt_field"])) {
                $explode_fields = explode(',', $index["rt_field"]);
                foreach ($explode_fields as $field) {
                    echo $field . "\n<br />";
                }
            } else {
                echo "<strong>#you didn't enter any fields</strong>\n<br />";
            	}
            }
            
            if (!empty($index["rt_attr"])) {
                $explode_it = explode(',', $index["rt_attr"]);
                foreach ($explode_it as $attr) {
                    echo $attr . "\n<br />";
                }
            }
            
            if ($index['index_type'] !== 'distributed'){
		         if (!empty($index["index_path"])) {
		             echo "path = " . $index["index_path"] . "\n<br />";
		         } else {
		             echo "<strong>you need a data directory path!</strong>\n<br />";
		         }
            }
            if (!empty($index["docinfo"])) {
                echo "docinfo = " . $index["docinfo"] . "\n<br />";
            }
            
            if (!empty($index["morphology"])) {
                echo "morphology = " . $index["morphology"] . "\n<br />";
            }
            
            if (!empty($index["index_sp"])) {
                echo "index_sp = " . $index["index_sp"] . "\n<br />";
            }
            
            if (!empty($index["html_strip"])) {
                echo "html_strip = " . $index["html_strip"] . "\n<br />";
            }
            
            if (!empty($index["html_index_attrs"])) {
                echo "html_index_attrs = " . $index["html_index_attrs"] . "\n<br />";
            }
            
            if (!empty($index["index_zones"])) {
                echo "index_zones = " . $index["index_zones"] . "\n<br />";
            }
            
            if (!empty($index["min_stemming_len"])) {
                echo "min_stemming_len = " . $index["min_stemming_len"] . "\n<br />";
            }
            
            if (!empty($index["stopwords"])) {
                echo "stopwords = " . $index["stopwords"] . "\n<br />";
            }
            
            if (!empty($index["wordforms"])) {
                echo "wordforms = " . $index["wordforms"] . "\n<br />";
            }
            
            if (!empty($index["embedded_limit"])) {
                echo "embedded_limit = " . $index["embedded_limit"] . "\n<br />";
            }
            
            if (!empty($index["exceptions"])) {
                echo "exceptions = " . $index["exceptions"] . "\n<br />";
            }
            
            echo "}\n<br />\n<br />";
        }
    }


//-----------------------------------|
//---------- SOURCE SETTINGS ------- |
//-----------------------------------|


//get source form info into an array and return it
function process_source()
{
    
    if (!empty($_POST['source_name'])) {
        $f_source_string['source_name'] = $_POST['source_name'];
    }
    
    
    if (!empty($_POST['sql_host'])) {
        $f_source_string['sql_host'] = $_POST['sql_host'];
    }
    
    if (!empty($_POST['sql_port'])) {
        $f_source_string['sql_port'] = $_POST['sql_port'];
    }
    
    if (!empty($_POST['sql_user'])) {
        $f_source_string['sql_user'] = $_POST['sql_user'];
    }
    
    if (!empty($_POST['sql_pass'])) {
        $f_source_string['sql_pass'] = $_POST['sql_pass'];
    }
    
    if (!empty($_POST['sql_db'])) {
        $f_source_string['sql_db'] = $_POST['sql_db'];
    }
    
    if (!empty($_POST['sql_sock'])) {
        $f_source_string['sql_sock'] = $_POST['sql_sock'];
    }
    
    if (!empty($_POST['mysql_connect_flags'])) {
        $f_source_string['mysql_connect_flags'] = $_POST['mysql_connect_flags'];
    }
    
    if (!empty($_POST['mysql_ssl_cert'])) {
        $f_source_string['mysql_ssl_cert'] = $_POST['mysql_ssl_cert'];
    }
    
    if (!empty($_POST['mysql_ssl_key'])) {
        $f_source_string['mysql_ssl_key'] = $_POST['mysql_ssl_key'];
    }
    
    if (!empty($_POST['mysql_ssl_ca'])) {
        $f_source_string['mysql_ssl_ca'] = $_POST['mysql_ssl_ca'];
    }
    
    if (!empty($_POST['attributes'])) {
        $f_source_string['attributes'] = $_POST['attributes'];
    }
    
    if (!empty($_POST['sql_query'])) {
        $f_source_string['sql_query'] = $_POST['sql_query'];
    }
    
    if (!empty($_POST['sql_joined_field'])) {
        $f_source_string['sql_joined_field'] = $_POST['sql_joined_field'];
    }
    
    if (!empty($_POST['sql_query_range'])) {
        $f_source_string['sql_query_range'] = $_POST['sql_query_range'];
    }
    
    if (!empty($_POST['mssql_winauth'])) {
        $f_source_string['mssql_winauth'] = $_POST['mssql_winauth'];
    }
    
    if (!empty($_POST['sql_column_buffers'])) {
        $f_source_string['sql_column_buffers'] = $_POST['sql_column_buffers'];
    }
    
    if (!empty($_POST['odbc_dsn'])) {
        $f_source_string['odbc_dsn'] = $_POST['odbc_dsn'];
    }
    
    if (!empty($_POST['source_type'])) {
        $f_source_string['source_type'] = $_POST['source_type'];
    }
    
    if (!empty($_POST['xmlpipe_command'])) {
        $f_source_string['xmlpipe_command'] = $_POST['xmlpipe_command'];
    }
    
    if (!empty($_POST['xmlpipe_fixup_utf8'])) {
        $f_source_string['xmlpipe_fixup_utf8'] = $_POST['xmlpipe_fixup_utf8'];
    }
    
    
    //if session source is not set, say 'its an array'. WHY DID I DO THIS?
    if (!isset($_SESSION["source"])) {
        $_SESSION["source"] = array();
    }
    
    return $f_source_string;
}

//this will print the source options form, which will change depending on the source type.
function print_source_form($source_type)
{
    
    echo <<<HERE
<form role="form" name="host" action="index_options.php" method="post">
	<div class='form-group'>
		<input type='hidden' name='source_type' value="$source_type">
	</div>
	<div class="form-group">
		<label for="source_name"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Source Name (mandatory)</a></label><br />
		<p class='help-block'>To inherit options from other sources, just add
			a ':' followed by the name of the source to inherit from.</p>
		<input type="text" name="source_name" placeholder="src1 or src2:src1">
	</div>
HERE;
    
    if ($source_type !== 'xmlpipe2' && $source_type !== 'tsvpipe') {
        echo <<<HERE
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
		<p class='help-block'>This is the main query, used to fetch the data you want to index.</p>
		<textarea name="sql_query" placeholder="SELECT id, group_id, UNIX_TIMESTAMP(date_added) AS date_added, title, content FROM documents"  style="width:300px!important"></textarea>
		</div>
HERE;
        
        //if it's an odbc, print these:
        if ($source_type == 'odbc') {
            echo <<<HERE
		<div class="form-group">	
			<label for="odbc_dsn"><a href="http://sphinxsearch.com/docs/current.html#conf-odbc-dsn">ODBC DSN</a></label><br />
			<p class='help-block'>ODBC DSN (Data Source Name) specifies the credentials (host, user, password, etc) to use when connecting to ODBC data source. The format depends on specific ODBC driver used.</p>
			<textarea name="odbc_dsn" placeholder="Driver={Oracle ODBC Driver};Dbq=myDBName;Uid=myUsername;Pwd=myPassword" style="width:300px!important"></textarea>
		</div>
		<div class="form-group">	
			<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a></label><br />
			<p class='help-block'>ODBC and MS SQL drivers sometimes can not return the maximum actual column size to be expected. For instance, NVARCHAR(MAX) columns always report their length as 2147483647 bytes to indexer even though the actually used length is likely considerably less. However, the receiving buffers still need to be allocated upfront, and their sizes have to be determined. When the driver does not report the column length at all, Sphinx allocates default 1 KB buffers for each non-char column, and 1 MB buffers for each char column. Driver-reported column length also gets clamped by an upper limit of 8 MB, so in case the driver reports (almost) a 2 GB column length, it will be clamped and a 8 MB buffer will be allocated instead for that column. These hard-coded limits can be overridden using the sql_column_buffers directive, either in order to save memory on actually shorter columns, or overcome the 8 MB limit on actually longer columns. The directive values must be a comma-separated lists of selected column names and sizes.</p>
			<textarea name="sql_column_buffers" placeholder="mytitle=64K, mycontent=10M" style="width:300px!important"></textarea>
		</div>
HERE;
        }
        
        //if it's a mssqlsource, print these:
        if ($source_type == 'mssql') {
            echo <<<HERE
			<div class="form-group">	
				<label for="mssql_winauth"><a href="http://sphinxsearch.com/docs/current.html#conf-mssql-winauth">Windows Authorization</a></label><br />
				<input type="text" name="mssql_winauth" placeholder="1 # use currently logged on user credentials"> 
			</div>
			<div class="form-group">	
				<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a></label><br />
				<p class="help-block">ODBC and MS SQL drivers sometimes can not return the maximum actual column size to be expected. For instance, NVARCHAR(MAX) columns always report their length as 2147483647 bytes to indexer even though the actually used length is likely considerably less. However, the receiving buffers still need to be allocated upfront, and their sizes have to be determined. When the driver does not report the column length at all, Sphinx allocates default 1 KB buffers for each non-char column, and 1 MB buffers for each char column. Driver-reported column length also gets clamped by an upper limit of 8 MB, so in case the driver reports (almost) a 2 GB column length, it will be clamped and a 8 MB buffer will be allocated instead for that column. These hard-coded limits can be overridden using the sql_column_buffers directive, either in order to save memory on actually shorter columns, or overcome the 8 MB limit on actually longer columns. The directive values must be a comma-separated lists of selected column names and sizes.</p>
				<textarea name="sql_column_buffers" placeholder="content=12M, comments=1M"></textarea>
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
        if ($source_type == 'mysql') {
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
				<p class="help-block">Joined fields let you avoid JOIN and/or GROUP_CONCAT statements in the main document fetch query (sql_query). This can be useful when SQL-side JOIN is slow, or needs to be offloaded on Sphinx side, or simply to emulate MySQL-specific GROUP_CONCAT functionality in case your database server does not support it.</p>
				<textarea name="sql_joined_field" type="text" placeholder="tagstext from query; SELECT docid, CONCAT('tag',tagid) FROM tags ORDER BY docid ASC" style="width:300px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="sql_query_range"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query-range">Ranged Query</a></label><br />
				<p class="help-block">Main query, which needs to fetch all the documents, can impose a read lock on the whole table and stall the concurrent queries (eg. INSERTs to MyISAM table), waste a lot of memory for result set, etc. To avoid this, Sphinx supports so-called ranged queries. With ranged queries, Sphinx first fetches min and max document IDs from the table, and then substitutes different ID intervals into main query text and runs the modified query to fetch another chunk of documents.</p>
				<textarea type="text" name="sql_query_range" placeholder="SELECT MIN(id),MAX(id) FROM documents" style="width:300px!important"></textarea>
			</div>

			
HERE;
    }
    echo <<<HERE
			<div class="form-group">
				<label for="attributes"><a href="http://sphinxsearch.com/docs/current.html#attributes">Attributes</a> <br /></label><br />
				<p class='help-block'>**Note that for xml and tsv source types, you'll have to use 'tsvpipe_attr' or 'xmlpipe_attr' instead of 'sql_attr',
				and you have to explicitly declare the full text field (with: "xmlpipe_attr_field" or "tsvpipe_attr_field") in addition to its attributes.</p>
				<p class='help-block'>Also, be aware that you can configure xmlpipe within the stream itself. Take a look at
				<a href='http://sphinxsearch.com/docs/current.html#ex-xmlpipe2-document'>this nice example</a>.</p>
				<p class='help-block'>And, be sure that the first column of tsvpipe is a unique document id-- and remember to separate each field/attribute with a comma.</p> 
				<textarea name="attributes" rows="4" placeholder="for sql type: sql_attr_uint=something, for xml type: xmlpipe_field_string, for tsv type: tsvpipe_attr_json" style="width:300px!important"></textarea>
			</div>
HERE;
    
    if ($source_type == 'xmlpipe2') {
        echo ' 
				<div class="form-group">	
					<label for="xmlpipe_command"><a href="http://sphinxsearch.com/docs/current.html#conf-xmlpipe-command">xml_command</a></label><br />
					<p class="help-block">Are you thinking, "what does cat mean"? It means that we will be reading this file. Go <a href="http://www.linfo.org/cat.html">here</a> to learn more.</p>
					<input type="text" name="xmlpipe_command" placeholder="cat /home/sphinx/test.xml"> 
				</div>
				<div class="form-group">	
					<label for="xmlpipe_fixup_utf8"><a href="http://sphinxsearch.com/docs/current.html#conf-xmlpipe-fixup-utf8">xml_fixup_utf8</a></label><br />
					<p class="help-block">Perform Sphinx-side UTF-8 validation and filtering to prevent XML parser from choking on non-UTF-8 documents. </p>
					<input type="text" name="xmlpipe_fixup_utf8" placeholder="1"> 
				</div>
	';
    }
    
    if ($source_type == 'tsvpipe') {
        echo '
				<div class="form-group">	
					<label for="tsvpipe_command"><a href="http://sphinxsearch.com/docs/current.html#tsvpipe">tsvpipe_command</a></label><br />
					<p class="help-block">Are you thinking, "what does cat mean"? Well, here it means that we will be reading this file. Go <a href="http://www.linfo.org/cat.html">here</a> to learn more.</p>
					<input type="text" name="tsvpipe_command" placeholder="cat /home/sphinx/test.tsv"> 
				</div>
							
';
    }
    echo <<<HERE
		<div class="form-group">
			<input type="submit" value="Submit">
		</div>
	</form>
HERE;
    
}

//give this function session['source'] array and it will print all source blocks
//if mandatory options are missing, it will tell you.
function print_source($sources)
{
    
    foreach ($sources as $source) {
        
        echo "source " . $source['source_name'] . "\n<br /> { \n<br />";
        
        echo "type = " . $source['source_type'] . "\n<br />";
        
        if ($source['source_type'] == 'xmlpipe2') {
            if (!empty($source['xmlpipe_command'])) {
                echo "xmlpipe_command = " . $source['xmlpipe_command'] . "\n<br />";
            } else {
                echo "<strong>you need to tell Sphinx where that xml is!</strong>\n<br />";
            }
            if ($source['xmlpipe_command'] !== '') {
                echo "xmlpipe_fixup_utf8 = " . $source['xmlpipe_command'] . "\n<br />";
            }
        }
        
        if ($source['source_type'] == 'mysql' || $source['source_type'] == 'pgsql' || $source['source_type'] == 'mssql' || $source['source_type'] == 'odbc') {
            if (!empty($source['sql_host'])) {
                echo "sql_host = " . $source['sql_host'] . "\n<br />";
            } else {
                echo "<strong>you need sql_host!</strong>\n<br />";
            }
            
            if (!empty($source['sql_port'])) {
                echo "sql_port = " . $source['sql_port'] . "\n<br />";
            } else {
                echo "<strong>you need sql_port!</strong>\n<br />";
            }
            
            if (!empty($source['sql_user'])) {
                echo "sql_user = " . $source['sql_user'] . "\n<br />";
            } else {
                echo "<strong>you need sql_user!</strong>\n<br />";
            }
            
            if (!empty($source['sql_pass'])) {
                echo "sql_pass = " . $source['sql_pass'] . "\n<br />";
            } else {
                echo "sql_pass = \n<br />";
            }
            
            if (!empty($source['sql_db'])) {
                echo "sql_db = " . $source['sql_db'] . "\n<br />";
            } else {
                echo "<strong>you need db name!</strong>\n<br />";
            }
            
            if (!empty($source['sql_sock'])) {
                echo "sql_sock = " . $source['sql_sock'] . "\n<br />";
            }
            
            if (!empty($source['mysql_connect_flags'])) {
                echo "mysql_connect_flags = " . $source['mysql_connect_flags'] . "\n<br />";
            }
            
            if (!empty($source['mysql_ssl_cert'])) {
                echo "mysql_ssl_cert = " . $source['mysql_ssl_cert'] . "\n<br />";
            }
            
            if (!empty($source['mysql_ssl_key'])) {
                echo "mysql_ssl_key = " . $source['mysql_ssl_key'] . "\n<br />";
            }
            
            if (!empty($source['mysql_ssl_ca'])) {
                echo "mysql_ssl_ca = " . $source['mysql_ssl_ca'] . "\n<br />";
            }
            
            if (!empty($source['sql_query'])) {
                echo "sql_query = " . $source['sql_query'] . "\n<br />";
            } else {
                echo "<strong>you need the main query!</strong>\n<br />";
            }
            
            if (!empty($source['sql_query_range'])) {
                echo "sql_query_range = " . $source['sql_query_range'] . "\n<br />";
            }
            
            if (!empty($source['sql_joined_field'])) {
                echo "sql_joined_field = " . $source['sql_joined_field'] . "\n<br />";
            }
            
            if (!empty($source['mssql_winauth'])) {
                echo "mssql_winauth = " . $source['mssql_winauth'] . "\n<br />";
            }
            
            if (!empty($source['sql_column_buffers'])) {
                echo "sql_column_buffers = " . $source['sql_column_buffers'] . "\n<br />";
            }
            
            if (!empty($source['odbc_dsn'])) {
                echo "odbc_dsn = " . $source['odbc_dsn'] . "\n<br />";
            }
        }
        
        if (!empty($source['attributes'])) {
            //now, inside this loop, take the attributes string and split it by ','
            $attrs = explode(',', $source['attributes']);
            foreach ($attrs as $attr) {
                echo $attr . "\n<br />";
            }
            //end if
        }
        //end config block
        echo "} \n<br />\n<br />";
        //end foreach
    }
}

//----------------------------------------------------|
//---------------- SEARCHD SETTINGS ------------------|
//----------------------------------------------------|


//this will take searchd form information and return an array
function process_searchd()
{
    
    if (isset($_POST['listen'])) {
        $f_searchd_string['listen'] = $_POST['listen'];
    }
    if (isset($_POST['log'])) {
        $f_searchd_string['log'] = $_POST['log'];
    }
    if (isset($_POST['query_log'])) {
        $f_searchd_string['query_log'] = $_POST['query_log'];
    }
    if (isset($_POST['pid'])) {
        $f_searchd_string['pid'] = $_POST['pid'];
    }
    
    return $f_searchd_string;
}

//searchd only takes one config block, so its not an array. when this function is run, the old settings are lost.
//give this function session['searchd']
function print_searchd($searchd)
{
    
    
    echo "searchd<br /> { \n<br />";
    if (!empty($searchd['listen'])) {
        $final_listen = explode(",", $searchd['listen']);
        foreach ($final_listen as $list) {
            echo "listen = " . $list . "\n<br />";
        }
    } else {
        echo "<strong>you need to tell sphinx where and how to listen!</strong>\n<br />";
    }
    if (!empty($searchd['log'])) {
        echo "log = " . $searchd['log'] . "\n<br />";
    } else {
        echo "<strong>you need to tell sphinx where to put searchd log files!</strong>\n<br />";
    }
    if (!empty($searchd['query_log'])) {
        echo "query_log = " . $searchd['query_log'] . "\n<br />";
    } else {
        echo "<strong>you need to tell sphinx where and how to listen!</strong>\n<br />";
    }
    if (!empty($searchd['pid'])) {
        echo "pid_file = " . $searchd['pid'] . "\n<br />";
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
				<textarea style="width:300px!important" name='listen' placeholder='separate them with a comma! localhost:9306:mysql41, 127.0.0.1:9306:mysqli41, 9306, etc...'></textarea>
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


//-------------------------------------------------|
//----------HTML FOR VARIOUS KINDS OF PAGES -------|
//-------------------------------------------------|


//usual header
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
         <li><a href="index.php">New Index</a></li>
         <li><a href="index.php?clear=yes">Clear everything</a></li>
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

<img src="configtut.png" style="
 border: none!important;
 overflow: auto!important;
 outline: none!important;
 -webkit-box-shadow: none!important;
 -moz-box-shadow: none!important;
 box-shadow: none!important;
 position: fixed!important;
 bottom: 50px !important;
 opacity: .4!important;
 right: 5px!important">
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
<img src="configtut.png" style="
 border: none!important;
 overflow: auto!important;
 outline: none!important;
 -webkit-box-shadow: none!important;
 -moz-box-shadow: none!important;
 box-shadow: none!important;
 position: fixed!important;
 bottom: 50px !important;
 opacity: .4!important;
 right: 5px!important">
 
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
