<?php if (post_password_required()) return; ?>

<div class="comments-container">

	<?php if (have_comments()) : ?>
		<h3>Comments</h3>

		<?php the_comments_navigation(); ?>

		<div class="media">
			<?php
				wp_list_comments([
					'walker' => new CommentsWalker,
					'short_ping' => true,
					'avatar_size' => 42,
				]);
			?>
		</div>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<div class="row">
		<div class="col-md-8">
			<?php
				comment_form([
					'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
					'title_reply_after'  => '</h3>',
					'comment_field' => '<div class="form-group"><label class="control-label" for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea name="comment" rows="5" maxlength="65525" aria-required="true" required="required" class="form-control"></textarea></div>',
					'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary" value="%4$s" />'
				]);
			?>
			
		</div>
	</div>

</div>
