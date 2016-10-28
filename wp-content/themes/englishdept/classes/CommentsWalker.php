<?php

/**
* Comment objects Walker class
*/
class CommentsWalker extends Walker_Comment
{
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$output = sprintf('<div class="media-left">%s<div class="media-body"><h5 class="media-heading">%s<br /><small>%s</small></h5>%s</div></div>',
			"",
			$item->comment_author_url ? '<a href="' . $item->comment_author_url . '">' . $item->comment_author . '</a>' : $item->comment_author,
			date('M j, Y', strtotime($item->comment_date)),
			$item->comment_content
			);
	}
}