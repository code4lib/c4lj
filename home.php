<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content" class="listpage">
        <?php $current = c4lj_current_issue_cat(); ?>
				<h1 class="pagetitle"><?php echo $current->cat_name; ?></h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if ( in_category( $current->cat_ID ) ): ?>
					<?php include (TEMPLATEPATH . '/excerpt.php'); ?>
					<?php endif; ?>
				<?php endwhile; endif; ?>
			</div>

<?php get_footer(); ?>