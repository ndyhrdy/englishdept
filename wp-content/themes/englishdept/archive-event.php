<?php get_header() ?>

	<section>
		
		<div class="row">
			<div class="col-lg-8">
				<?php if(have_posts()): ?>
					<h1>
						<?php if (isset($_GET['ondate'])): ?>
							What's on at <?php echo date('M j, Y', strtotime($_GET['ondate'] . ' 00:00:00')) ?>
						<?php endif ?>
					</h1>
					<?php while(have_posts()): the_post() ?>
						<div class="post-list-item">
							<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
							<div class="ellipsis-multiline">
								<?php the_content(); ?>
							</div>
							<div style="margin-top:5px;">
								<?php foreach(get_the_tags() as $tag): ?>
									<a href="<?php echo get_tag_link($tag) ?>" class="label label-primary"><?php echo $tag->name ?></a>
								<?php endforeach; ?>
							</div>
						</div>

					<?php endwhile ?>
				<?php else: ?>

					
				<?php endif ?>
			</div>
		</div>
	</section>

<?php get_footer() ?>