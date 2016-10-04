<?php get_header() ?>

	<section>

		<div class="row">
			<div class="col-lg-8">
				<?php if (have_posts()): ?>		
					<h1>Search results for "<?php echo $_GET['s'] ?>"</h1>

					<div class="post-list">
						<?php while(have_posts()): the_post(); ?>
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
					</div>

				<?php else: ?>

					<h1>Oops,<br /><small>we couldn't find anything related to "<?php echo $_GET['s'] ?>"</small></h1>

				<?php endif ?>
				
			</div>
			<div class="col-lg-4"></div>
		</div>

	</section>

<?php get_footer() ?>