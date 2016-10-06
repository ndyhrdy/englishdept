<?php get_header() ?>

	<section>
		<div class="row">
			<div class="col-md-8">
				<?php if (have_posts()): the_post(); ?>

					<h1><?php the_title() ?></h1>
					<div>
						<?php the_content() ?>
					</div>

				<?php endif; ?>
				
			</div>
			<div class="col-md-3 col-md-offset-1">
				<div class="sidebar">
					<?php dynamic_sidebar('englishdept-aside-sidebar') ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer() ?>