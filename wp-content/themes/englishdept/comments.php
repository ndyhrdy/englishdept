<?php 

/*
 * Comments Section Template
 * Displays a standard comments list and form used by posts
 *
 * Author: Endy Hardy
 * Tweet to me at twitter.com/ndyhrdy
 */

if (post_password_required()) return; 
?>

<div class="comments-container">

	<?php if (have_comments()) : ?>
		<h3>Comments</h3>

		<?php the_comments_navigation(); ?>

		<div class="media">
			<?php
				wp_list_comments(array(
					'walker' => new CommentsWalker,
					'short_ping' => true,
					'avatar_size' => 42,
				));
			?>
		</div>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<div class="row">
		<div class="col-sm-9">
			<div class="form-horizontal">
				<?php
					$commenter = wp_get_current_commenter();
					$req = get_option('require_name_email');
					$aria_req = ($req ? " aria-required='true'" : '');

					comment_form(array(
						'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
						'title_reply_after'  => '</h3>',
						'fields' => array(
							'author' => '<div class="form-group"><label for="author" class="control-label col-sm-4"><span class="pull-left">' . __('Name', 'domainreference') . ($req ? '*' : '' ) . '</span></label><div class="col-sm-8"><input name="author" class="form-control" type="text" value="' . esc_attr($commenter['comment_author']) . '"' . $aria_req . ' /></div></div>',
							'email' => '<div class="form-group"><label for="email" class="control-label col-sm-4"><span class="pull-left">' . __('Email', 'domainreference') . ( $req ? '*' : '' ) . '</span></label><div class="col-sm-8"><input name="email" class="form-control" type="email" value="' . esc_attr($commenter['comment_author_email']) . '"' . $aria_req . ' /></div></div>',
							'url' => '<div class="form-group"><label for="url" class="control-label col-sm-4"><span class="pull-left">' . __('Website', 'domainreference') . '</span></label><div class="col-sm-8"><input name="url" class="form-control" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" /></div></div>'
						),
						'comment_field' => '<div class="form-group"><label class="control-label col-xs-12" for="comment"><p class="pull-left">' . _x( 'Comment', 'noun' ) . '</p></label><div class="col-xs-12"><textarea name="comment" rows="5" maxlength="65525" aria-required="true" required="required" class="form-control"></textarea></div></div>',
						'submit_button' => '<br /><div class="form-group"><div class="col-xs-12"><input name="%1$s" type="submit" id="%2$s" class="btn btn-primary" value="%4$s" /></div></div>'
					));
				?>
			</div>
		</div>
	</div>

</div>
