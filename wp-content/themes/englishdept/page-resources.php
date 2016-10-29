<?php get_header() ?>
<?php the_post() ?>

	<div class="jumbotron jumbotron-primary text-center"<?php if (has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url('full') ?>');"<?php endif; ?>>
		<h1><?php the_title() ?></h1>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php the_content() ?>
			</div>
		</div>
	</div>
	<section>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php 
				$doctypes = get_terms('document-type', array('hide_empty' => false));
				foreach($doctypes as $type):
					$posts = pods('document');
					$posts->find(array(
						'limit' => 5,
						'where' => "document-type.slug = '" . $type->slug . "'"
						));
					if ($posts->total() > 0):
						?>
						<div class="row">
							<div class="col-sm-3 text-center" style="padding-top: 45px;">
								<b class="fa fa-file-text fa-fw fa-5x"></b>
							</div>
							<div class="col-sm-9">
								<h4 class="page-header">Recently Uploaded - <?php echo $type->name ?></h4>
								<div class="post-list">
									<?php while ($posts->fetch()): ?>
										<div class="post-list-item">
											<h5 class="ellipsis"><a href="<?php echo get_the_permalink($posts->field('id')) ?>?ref=<?php echo urlencode(get_the_permalink()) ?>"><?php echo $posts->display('title') ?></a></h5>
											<div class="ellipsis-multiline">
												<?php echo $posts->display('content') ?>
											</div>
										</div>
									<?php endwhile ?>
								</div>
								<p>
									<a href="<?php echo get_term_link($type->slug, 'document-type') ?>">Browse all <b class="fa fa-arrow-right"></b></a>
								</p>
							</div>
							
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>

	</section>

<?php get_footer() ?>