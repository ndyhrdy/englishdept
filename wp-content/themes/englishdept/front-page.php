<?php 

/*
 * Home Page Template
 * Used as the site's front page to display recent posts
 * chronologically
 *
 * Author: Endy Hardy
 * Tweet to me at twitter.com/ndyhrdy
 */

get_header() 
?>

	<div class="carousel slide" id="carousel-cover" data-ride="carousel" data-interval="10000">
		<div class="carousel-inner">
			<?php
				$stickies = get_option('sticky_posts');
				$stickies = array_slice($stickies, 0, 5);
				$stickies_query = new WP_Query(array('post__in' => $stickies, 'ignore_sticky_posts' => 1));
				$stickies_index = 0;
				while($stickies_query->have_posts()):
					$sticky_post = $stickies_query->the_post();
					if (has_post_thumbnail($sticky_post)):
						?>
						<div class="item <?php echo $stickies_index == 0 ? 'active' : '' ?>">
							<?php echo get_the_post_thumbnail($sticky_post, 'full') ?>
							<div class="carousel-caption">
								<h2><?php the_title() ?></h2>
								<p class="text-muted">
									<?php echo get_the_date() ?>
								</p>
								<div class="ellipsis-multiline"><?php echo apply_filters('the_excerpt', get_the_content()) ?></div>
								<h4><a href="<?php the_permalink() ?>">Read more <b class="fa fa-arrow-right"></b></a></h4>
							</div>
						</div>
						<?php
						$stickies_index++; 
					endif;
				endwhile; 
			?>
		</div>
		<div class="carousel-controls">
			<a href="#carousel-cover" data-slide="prev">
			    <span class="fa fa-chevron-left fa-fw fa-2x"></span>
			    <span class="sr-only">Previous</span>
			</a>
			<a href="#carousel-cover" data-slide="next">
			    <span class="fa fa-chevron-right fa-fw fa-2x"></span>
			    <span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<section>
		<div class="row">
			<div class="col-md-9">
				<span class="h3 text-uppercase section-heading">Recent Updates</span>
				<div class="row post-thumbnail-group">
					<br />
					<?php 
					while(have_posts()): 
						the_post(); 
						?>
						<div class="col-lg-4 col-sm-6">
							<div class="post-thumbnail-group-item">
								<?php if (has_post_thumbnail(get_the_ID())): ?>
									<a href="<?php the_permalink() ?>" class="image">
										<?php echo get_the_post_thumbnail(get_the_ID(), 'medium') ?>
										<div class="caption"><?php echo get_the_date() ?></div>
									</a>
								<?php endif; ?>
								<h4 class="ellipsis"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
								<div class="ellipsis-multiline"><?php the_content() ?></div>
							</div>
						</div>
					<?php endwhile; ?>

				</div>
				<br />
				<p style="margin-bottom:45px;"><a href="<?php echo get_category_link(3) ?>">All updates <b class="fa fa-fw fa-arrow-right"></b></a></p>
			</div>
			<div class="col-md-3 hidden-sm hidden-xs">
				<div class="sidebar sidebar-single">
					<?php dynamic_sidebar('englishdept-aside-sidebar') ?>
				</div>

			</div>
		</div>
	</section>

<?php get_footer() ?>