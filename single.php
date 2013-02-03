<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="article" id="post-<?php the_ID(); ?>">
					<p id="issueDesignation"><?php foreach( (get_the_category()) as $cat ) {
              $parent = get_category($cat->category_parent);
							if ( $parent && $parent->category_nicename == "issues" ) { // category should be child of Issues
								echo '<a href="'. get_category_link($cat->cat_ID).'">'.$cat->cat_name.", ".$cat->category_description."</a>";
								break; // only do this once. Something's wrong if it's in multiple issues
							}
						}?></p>
					<h1 class="articletitle"><?php the_title(); ?></h1>
					<div class="abstract">
						<?php the_excerpt(); ?>
					</div>
					<div class="entry">
						<?php the_content('<p class="readmore">Read this article...</p>'); ?>
					</div>
					<?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
					<?php edit_post_link('Edit this article', '<p class="editlink">', '</p>'); ?>
				</div>
				<?php comments_template(); ?>
				<?php endwhile; else: ?>
					<p>Sorry, the article you're looking for doesn't seem to exist.</p>
				<?php endif; ?>
			</div>

<?php get_footer(); ?>