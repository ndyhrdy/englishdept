<?php get_header() ?>
<?php the_post() ?>

	<div class="jumbotron jumbotron-primary"<?php if (has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url('full') ?>');"<?php endif; ?>>
		<h1><?php the_title() ?></h1>
	</div>
	<section>
		<div class="row">
			<div class="col-md-8">
				<?php the_content() ?>

				<div class="row">
					<br />
					<?php 
					$pages = get_pages([
						'child_of' => get_the_ID(),
						'sort_column' => 'menu_order',
					]);
					$icons = ['preface' => 'comments', 'lecturers' => 'users', 'contact-us' => 'envelope'];
					foreach ($pages as $page):
						?>
						<div class="col-sm-4">
							<a href="<?php echo get_the_permalink($page->ID) ?>" class="thumbnail">
								<div class="caption text-center">
									<div style="padding-top:10px;"><b class="fa fa-fw fa-<?php echo $icons[$page->post_name] ?> fa-5x"></b></div>
									<div class="h4"><?php echo $page->post_title ?></div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-3 col-md-offset-1">
				<div class="sidebar sidebar-single">
					<?php dynamic_sidebar('englishdept-aside-sidebar') ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer() ?>