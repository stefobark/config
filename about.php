<?php
require_once('functions.php');
print_header();
echo <<<HERE
<div class="container" style="margin-top:75px!important">
<h1 class="text-center">What is this thing?</h1>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<h4 class="text-center">The basic idea</h4>
		
			<p class="help-block" style="text-indent:15px">
				I'm always making little configuration files to test Sphinx in different ways. 
				I want to make configuring Sphinx quicker... and easier to keep together in my head.
				I want to remember what options are mandatory and what options are dependent on other options. Also, 
				and more importantly, I want to help make it easier for Sphinx-newcomers to grasp configuration.
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<h4 class="text-center">So...</h4>
		
			<p class="help-block" style="text-indent:15px">
				It's not real pretty, but I'm writing this to tie together the basic 
				flow. There are very many configuration options, so I'm starting with the mandatory ones.
				Right now, the user can go through and add <em>multiple sources, multiple indexes, and define searchd 
				settings</em>. Then, they'll have some formatted text to
				copy and paste into some .conf file.
			</p>
		
			<p class="help-block" style="text-indent:15px">
				At this point (right now, it's some mid-August day in 2014), I've only finished 
				plain ol' MySQL datasources. So, you can define an index with a MySQL datasource and then setup searchd.
				I haven't finished <em>indexer options</em>, so you'll get default settings if you use what this little 
				configuration file maker produces. In the future, I'll set up
				easy copying for easy pasting and/or the ability to download a file. For now, hopefully this makes 
				getting started with Sphinx a tad bit easier.
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<h4 class="text-center">No Way!</h4>
			
			<p class="help-block" style="text-indent:15px">You don't want to enter all of your sensitive connection info? That's fine. Just put in some placeholder.. Or, don't put anything into the field, just add it later.
			Or! Go grab the files and run it on your own machine!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<h4 class="text-center">Can I help?</h4>
		
			<p class="help-block" style="text-indent:15px">
				Good question! You can indeed help me build this. Go check out the git repo. 
				Tell me what I'm doing wrong and tell me what I be could doing better. I will appreciate it.
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<h4 class="text-center">How do I use this?</h4>
		
			<p class="help-block" style="text-indent:15px">
				Another good question! Assuming you've installed Sphinx already: after you've 
				copied and pasted the text into some ".conf" file, go the terminal and run indexer using that file you just made. 
				Just point indexer to the configuration file and specify the name of your index.. or say "--all", 
				or even --rotate (if you've already indexed it).
			</p>
		
			<p class="help-block" style="text-indent:15px">
				Like this:
			</p>
		
			<p class="help-block" style="text-indent:50px">
				indexer -c /path/to/your.conf index_name
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<h4 class="text-center">Questions?</h4>
		
			<p class="help-block" style="text-indent:15px">
				Email me at steve at sphinxsearch dot com. Or, want to see some of the 
				other things I'm exploring (mostly related to Sphinx as well)?
				Go read my <a href="http://sphinxish.blogspot.com">personal blog</a>. Want Sphinx news and some 
				tutorials? Go to the <a href="http://sphinxsearch.com/blog">fulltext diary</a>.
			</p>
		</div>
	</div>
</div>
HERE;
?>
