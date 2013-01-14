<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content" class="listpage">
				<h1 class="pagetitle">Search Results</h1>
				<?php if (have_posts()) : ?>
					<h2>Showing <?php echo $wp_query->post_count; ?> articles matching "<?php the_search_query(); ?>"</h2>
					<?php while (have_posts()) : the_post(); ?>
						<?php include (TEMPLATEPATH . '/excerpt.php'); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<h2>No articles matched your search. Please try again.</h2>
				<?php endif; ?>
			</div>

<?php get_footer(); ?>