<?php if($staff->total() > 0): 
	$staff_index = 0;
	?>

	<div class="row">
		<?php while($staff->fetch()): ?>
			<div class="col-md-4">
				<div class="staff">
					<div class="image">
						<?php echo get_the_post_thumbnail($staff->field('id'), 'medium') ?>
					</div>
					<div class="caption">
						<?php 
						$staff_name = $staff->display('pre-text') . " ";
						$staff_name .= "<strong>" . $staff->display('title') . "</strong>";
						$staff_name .= strlen(trim($staff->field('post-text'))) > 0 ? ', ' : '';
						$staff_name .= $staff->display('post-text');
						?>
						<div class="h4 ellipsis">
							<a href="<?php echo get_the_permalink($staff->field('id')) ?>" title="<?php echo strip_tags($staff_name) ?>"><?php echo $staff_name; ?></a>
						</div>
						<?php 
						$since = $staff->display('staff-since');
						if (strlen(trim($since)) > 0):
							?>
							<div class="text-muted small">Lecturer since <?php echo date('M j, Y', strtotime($since)) ?></div>
						<?php endif; ?>

						<?php
						$classes = $staff->field('classes');
						if (strlen(trim($classes)) > 0):
							$classes = explode(PHP_EOL, $classes);
							$class_content = "";
							if (count($classes)):
								?>
								<div class="ellipsis small"><span class="text-muted">Currently teaching <?php echo count($classes) . " " . (count($classes) > 1 ? "classes" : "class") ?></span></div>
							<?php 
							endif; 
						endif; ?>

						<?php 
						$media = $staff->field('social-media'); 
						$media = explode(PHP_EOL, $media);
						if (count($media)):
							?>
							<ul class="list-inline social-media">
								<?php foreach($media as $m): 
									$m = explode('*', $m);
									$supported_media = ['facebook', 'twitter', 'google-plus', 'instagram', 'linkedin', 'web'];
									if (in_array($m[0], $supported_media)):
										?>
										<li><a href="<?php echo $m[1] ?>" target="_blank" rel="nofollow"><b class="fa fa-<?php echo strtolower($m[0]) == 'web' ? 'globe' : strtolower($m[0])?>"></b></a></li>
									<?php 
									endif;
								endforeach; 
								?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata(); 
		?>
	</div>

<?php endif; ?>