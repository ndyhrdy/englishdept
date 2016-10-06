<?php get_header() ?>

	<?php if (have_posts()): the_post(); ?>
	
		<section>
			<div class="row">
				<div class="col-md-9">
					<?php if (has_post_thumbnail()): ?>
						<div class="single-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>')">
							<div class="caption">
								<h1><?php the_title() ?></h1>
								<div>
									<?php if (count(get_the_category()) > 0): ?>
										<span class="small text-uppercase"><?php echo esc_html(get_the_category()[0]->name) ?> /</span>
									<?php endif ?>
									<?php the_date() ?> &mdash;
									by <?php the_author() ?>
								</div>
							</div>
						</div>
					<?php else: ?>
						<h1><?php the_title() ?></h1>
						<p class="text-muted">
							<?php if (count(get_the_category()) > 0): ?>
								<span class="label label-primary"><?php echo esc_html(get_the_category()[0]->name) ?></span>
							<?php endif; ?>
							<?php the_date() ?> &mdash; 
							by <?php the_author() ?>
						</p>
					<?php endif; ?>

					<?php the_content() ?>


					<?php 
					if (count(get_the_category()) > 0):
						$no_comments_categories = ['announcement'];
						if (!in_array(get_the_category()[0]->slug, $no_comments_categories)):
							comments_template();
						endif;
					endif;
					?>
				<?php endif; ?>
				
			</div>
			<div class="col-md-3 hidden-sm hidden-xs">
				<div class="sidebar sidebar-single">
					<?php dynamic_sidebar('englishdept-aside-sidebar') ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer() ?>