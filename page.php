<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="page" id="post-<?php the_ID(); ?>">
					<h1 class="pagetitle"><?php the_title(); ?></h1>
					<div class="entry">
						<?php the_content('<p class="readmore">Read the rest of this page...</p>'); ?>
					</div>
				</div>
				<?php endwhile; endif; ?>
				<?php edit_post_link('Edit this page.', '<p class="editlink">', '</p>'); ?>
			</div>

<?php get_footer(); ?>