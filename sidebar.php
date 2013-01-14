			<div id="meta">
				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
					<div>
						<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" tabindex="1" />
						<input type="submit" value="Search" id="searchsubmit" tabindex="2" />
					</div>
				</form>
				<div id="archives">
					<h2>Current Issue</h2>
						<ul>
							<li><?php echo c4lj_current_issue(); ?></li>
						</ul>
						
					<h2>Previous Issues</h2>
						<ul>
              <?php echo c4lj_recent_issues(); ?>
              <li><a href="/issues">Older Issues</a></li>
						</ul>
				</div>
				<div id="about">
					<h2>About</h2>
					<ul>
						<?php wp_list_pages('title_li=&sort_column=menu_order&meta_key=section&meta_value=about'); ?>
						<li><a href="http://code4lib.org/">Code4Lib</a></li>
					</ul>
				</div>
				<div id="forauthors">
					<h2>For Authors</h2>
					<ul>
						<?php wp_list_pages('title_li=&sort_column=menu_order&meta_key=section&meta_value=authors'); ?>
					</ul>
				</div>
			</div>
			<?php wp_meta(); ?>
			
