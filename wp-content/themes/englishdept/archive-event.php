<?php get_header() ?>

	<section>
		
		<div class="row">
			<div class="col-md-9">
				<?php if(have_posts()): ?>
					<h1>
						<?php if (isset($_GET['ondate'])): ?>
							What's on at <?php echo date('M j, Y', strtotime($_GET['ondate'])) ?>
						<?php else: ?>
							Upcoming Events
						<?php endif ?>
					</h1>
					<div class="post-list">
						<?php while(have_posts()): the_post() ?>
							<div class="post-list-item">
								<h3>
									<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
								</h3>
								<div class="text-muted">
									<?php eo_the_start('G:i a') ?>
									<?php if (eo_get_the_start('H:i') != eo_get_the_end('H:i')) echo 'to ' . eo_get_the_end('G:i a') ?>
								</div>
								<div class="ellipsis">
									<?php the_content(); ?>
								</div>
								<div style="margin-top:5px;">
									<?php foreach(get_the_terms(get_the_ID(), 'event-tag') as $tag): ?>
										<a href="<?php echo get_tag_link($tag) ?>" class="label label-primary"><?php echo ucfirst($tag->name) ?></a>
									<?php endforeach; ?>
								</div>
							</div>

						<?php endwhile ?>
					</div>
				<?php else: ?>
					<h1>Oops, there are no upcoming events yet.</h1>

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