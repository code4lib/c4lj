				<div class="article" id="post-<?php the_ID(); ?>">
					<h2 class="articletitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="author"><?php the_author(); ?></p>
					<div class="abstract">
						<?php the_excerpt(); ?>
					</div>
				</div>