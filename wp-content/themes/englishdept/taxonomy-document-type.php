<?php get_header(); ?>

	<section>
		<div class="row">
			<div class="col-lg-3" style="margin-top:15px;">
				<div data-spy="affix" data-offset-top="60" style="width:252px;">
					<div class="h4">Browse Resources</div>
					<ul class="list-unstyled">
						<?php foreach(get_terms('document-type', ['hide_empty' => false]) as $term): ?>
							<?php if (get_queried_object()->slug == $term->slug): ?>
								<li><strong><?php echo $term->name ?></strong></li>
							<?php else: ?>
								<li><a href="<?php echo get_term_link($term->slug, 'document-type') ?>"><?php echo $term->name ?></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
				<?php 
				if (have_posts()): 
					$doc = pods('document');
					?>
					<div class="post-list">
						<?php while(have_posts()): 
							the_post(); 
							$doc->fetch(get_the_ID());
							?>
							<div class="post-list-item">
								<h3><a href="<?php the_permalink() ?>"><?php echo $doc->display('title') ?></a></h3>
								<p class="small text-muted">
									<?php echo strlen(trim($doc->display('date_published'))) > 0 ? 'Published on ' . date('M j, Y', strtotime($doc->display('date_published'))) : '' ?>
								</p>
								<div class="ellipsis-multiline">
									<?php the_content(); ?>
								</div>
								<div style="margin-top:5px;">
									<?php foreach(get_the_tags() as $tag): ?>
										<a href="<?php echo get_tag_link($tag) ?>" class="label label-primary"><?php echo $tag->name ?></a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<?php $page_links = paginate_links(['type' => 'array']) ?>
					<?php if (count($page_links) > 0): ?>
						<ul class="pagination">
							<?php foreach($page_links as $page_link): ?>
								<li><?php echo $page_link ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				<?php else: ?>
					<h3>No <?php echo strtolower(get_queried_object()->name) ?> resources found.</h3>
				<?php endif; ?>
			</div>
			<div class="col-lg-3"></div>
		</div>
	</section>

<?php get_footer(); ?>