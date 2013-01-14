<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content" class="listpage">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php include (TEMPLATEPATH . '/excerpt.php'); ?>
				<?php endwhile; endif; ?>
			</div>

<?php get_footer(); ?>