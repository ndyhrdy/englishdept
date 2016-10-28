<?php 

/*
 * Single Category Taxonomy Page Template
 * Displays a list of posts under the queried category taxonomy
 *
 * Author: Endy Hardy
 * Tweet to me at twitter.com/ndyhrdy
 */

get_header(); 
$cat = get_queried_object();
?>

	<section>

		<div class="row">
			<div class="col-md-9">

				<h1><?php echo 'All ' . $cat->name . 's' ?></h1>

				<?php if (have_posts()): ?>

					<div class="post-list">
						<?php while(have_posts()): the_post() ?>
							<div class="post-list-item">
								<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
								<div class="text-muted">
									<?php echo get_the_date() ?>
								</div>
								<div class="ellipsis-multiline">
									<?php the_content(); ?>
								</div>
								<div style="margin-top:5px;">
									<?php foreach(get_the_tags() as $tag): ?>
										<a href="<?php echo get_tag_link($tag) ?>" class="label label-primary"><?php echo ucfirst($tag->name) ?></a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endwhile ?>
					</div>
				<?php endif ?>

			</div>
			<div class="col-md-3 hidden-sm hidden-xs">
				<div class="sidebar sidebar-single">
					<?php dynamic_sidebar('englishdept-aside-sidebar') ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer() ?>