<?php get_header() ?>

	<section>
		<div class="row">
			<div class="col-md-8">
				<?php if (have_posts()): 
					$doc = pods('document'); 
					$doc->fetch(get_the_ID());
					$doctype = $doc->field('document-type')[0];
					?>
					<h1>
						<a href="<?php echo isset($_GET['ref']) ? urldecode($_GET['ref']) : get_term_link($doctype['slug'], 'document-type') ?>"><b class="fa fa-angle-left"></b></a>
						&nbsp;<?php echo $doc->display('title') ?>
					</h1>

					<br />

					<div class="form-horizontal">
						<div class="form-group">
							<div class="col-lg-3">
								Document Type
							</div>
							<span class="col-lg-9">
								<a href="<?php echo get_term_link($doctype['slug'], 'document-type') ?>"><?php echo $doctype['name'] ?></a>
							</span>
						</div>

						<?php if (strlen(trim($doc->display('date_published'))) > 0): ?>
							<div class="form-group">
								<div class="col-lg-3">
									Publish Date
								</div>
								<span class="col-lg-9">
									<?php echo date('M j, Y', strtotime($doc->display('date_published'))) ?>
								</span>
							</div>
						<?php endif; ?>

						<?php 
						$authors = $doc->field('staff_authors') ?: [];
						$authors = array_merge($authors, explode(PHP_EOL, $doc->field('authors')));
						if ($authors[0]): ?>
							<div class="form-group">
								<div class="col-lg-3">
									Contributing Author(s)
								</div>
								<div class="col-lg-9">
									<?php foreach ($authors as $author): ?>
										<?php if (isset($author['post_name'])): ?>
											<div><a href="<?php echo get_the_permalink($author['ID']) ?>?ref=<?php echo urlencode(get_permalink(get_the_ID())) ?>"><?php echo $author['post_title'] ?></a></div>
										<?php else: ?>
											<div><?php echo $author ?></div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif ?>

						<?php $journals = explode(PHP_EOL, $doc->field('published_in_journals')); ?>
						<?php if ($journals[0]): ?>
							<div class="form-group">
								<div class="col-lg-3">
									Featured in Journal(s)
								</div>
								<div class="col-lg-9">
									<?php foreach ($journals as $journal): ?>
										<div><?php echo $journal ?></div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif ?>

						<div class="form-group">
							<div class="col-lg-3">
								Abstract
							</div>
							<div class="col-lg-9">
								<?php echo $doc->display('content') ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-3">
								Keyword(s)
							</div>
							<div class="col-lg-9">
								<?php $tags = get_the_tags(); ?>
								<?php foreach($tags as $index => $tag): ?>
									<a href="<?php echo get_tag_link($tag) ?>"><?php echo $tag->name ?></a>
									<?php if (isset($tags[$index + 1])) echo "/" ?>
								<?php endforeach; ?>

							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<a href="<?php echo $doc->display('file') ?>" class="btn btn-primary btn-lg">Download <b class="fa fa-fw fa-download"></b></a>
							</div>
						</div>

					</div>
				<?php endif; ?>
				
			</div>
		</div>
	</section>

<?php get_footer() ?>