<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content" class="listpage">
				<?php $i=0; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php 
				    foreach( (get_the_category()) as $cat ) {
                        $parent = get_category($cat->category_parent);
                        if ( $parent && $parent->category_nicename == "issues" ) { // category should be child of Issues
                            if ($i < 1) {
                                echo "<h1 class=\"pagetitle\">".$cat->cat_name.", ".$cat->category_description;
                                break; // only do this once. Something's wrong if it's in multiple issues
                            }
                        }
                    }
                    $i = $i + 1; 
                    echo "</h1>"; ?>
				<?php include (TEMPLATEPATH . '/excerpt.php'); ?>
				<?php endwhile; endif; ?>
			</div>

<?php get_footer(); ?>