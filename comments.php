<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="oddcomment" ';
?>
<!-- You can start editing here. -->

<div class="comments">
	<p class="subscriptionlinks">Subscribe to comments: <?php comments_rss_link('For this article'); ?> | <a href="http://feeds.feedburner.com/c4lj/comments">For all articles</a></p>
<?php if ($comments) : ?>
	<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?> to "<?php the_title(); ?>"</h3>
	
	<p class="aboutcomments">
		<?php if ('open' == $post-> comment_status) { // Comments are open ?>
			Please <a href="#respond">leave a response</a> below, or <a href="<?php trackback_url(display); ?>">trackback</a> from your own site.
		<?php } elseif (!('open' == $post-> comment_status)) { // Comments are closed ?>
			Comments on this article are currently closed.
		<?php } ?>
	</p>
	
	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>
		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<p class="commentheader"><cite><?php comment_author_link() ?></cite>,
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>

			<span class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date() ?></a><?php edit_comment_link('edit',' | ',''); ?></span></p>
      
      <div class="commentbody">
  			<?php comment_text() ?>
      </div>

		</li>
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="oddcomment" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Leave a Reply</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
<label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
<label for="url">Website</label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" tabindex="4" cols="50" rows="10"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>

</div>