<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

			<div id="content" class="listpage">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="page" id="post-<?php the_ID(); ?>">
					<h1 class="pagetitle"><?php the_title(); ?></h1>
					<div class="entry">
            <?php
          
            $issue_parent = get_category_by_slug('issues');
            $categories = get_categories( "child_of=$issue_parent->cat_ID&orderby=ID&order=desc&hierarchical=0" );
            
            $published = get_option( 'im_published_categories' );
            
            foreach ( $categories as $cat ) {
              if ( in_array( $cat->cat_ID, $published ) ) {
                $cats[] = $cat;
              }
            }
            foreach ( $cats as $cat ):
              $query = new WP_Query(array('cat' => $cat->cat_ID, 'order' => 'DESC', 'orderby' => 'date', 'post_status' => 'publish', 'posts_per_page' => -1));
              if ( $query->have_posts() ): ?>
              <div class="issue">
                <h2 class="issuetitle"><a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?>, <?php echo $cat->category_description; ?></a></h2>
                <ul class="titlelist">
                <?php while( $query->have_posts() ): $query->the_post(); ?>
                  <li>
                    <h3 class="articletitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="author"><?php the_author(); ?></p>
                  </li>
                <?php endwhile; ?>
                </ul>
              </div>
              <?php endif;
            endforeach;
            ?>
					</div>
				</div>
				<?php endwhile; endif; ?>
			</div>

<?php get_footer(); ?>