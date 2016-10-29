<?php 
get_header();
the_post();
$staff = pods('staff');
$staff->fetch(get_the_ID());
?>
	<section>
		<div class="row">
			<div class="col-lg-8">

				<?php 
				$staff_name = $staff->display('pre-text') . " ";
				$staff_name .= "<strong>" . $staff->display('title') . "</strong>";
				$staff_name .= strlen(trim($staff->field('post-text'))) > 0 ? ', ' : '';
				$staff_name .= $staff->display('post-text');
				?>
				<div class="staff-details">
					<div class="staff-image">
						<?php
						if (has_post_thumbnail($staff->field('id'))) 
							echo get_the_post_thumbnail($staff->field('id'), 'full');
						else echo '<img src="' . get_template_directory_uri() . '/images/placeholder-avatar.png">';
						?>
					</div>
					<h1>
						<a href="<?php echo isset($_GET['ref']) ? urldecode($_GET['ref']) : get_permalink(get_page_by_path('the-department/lecturers')) ?>"><b class="fa fa-angle-left"></b></a>
						&nbsp;<?php echo $staff_name ?>
					</h1>
					<?php
					$since = $staff->display('staff-since');
					if (strlen(trim($since)) > 0):
						?>
						<div class="h4 text-muted">Lecturer since <?php echo date('M j, Y', strtotime($since)) ?></div>
					<?php endif; ?>

					<div>
						<?php echo apply_filters('the_content', $staff->field('bio')) ?>
					</div>

					<div class="form-horizontal">

						<?php if (strlen(trim($staff->display('email')))): ?>
							<div class="form-group">
								<div class="col-sm-3">Email Address</div>
								<div class="col-sm-9">
									<?php echo $staff->display('email') ?>
									<a href="mailto:<?php echo $staff->display('email') ?>"><b class="fa fa-fw fa-external-link"></b></a>
								</div>
							</div>
						<?php endif; ?>

						<?php 
						$classes = $staff->field('classes'); 
						$classes = explode(PHP_EOL, $classes);
						if ($classes[0]):
							?>
							<div class="form-group">
								<div class="col-sm-3">Current class(es)</div>
								<div class="col-sm-9">
									<?php foreach($classes as $class): ?>
										<div><?php echo $class ?></div>
									<?php endforeach ?>
								</div>
							</div>
						<?php endif; ?>

						<?php 
						$publications = $staff->field('documents'); 
						if (count($publications[0]) > 0):
							?>
							<div class="form-group">
								<div class="col-sm-3">Publication(s)</div>
								<div class="col-sm-9">
									<?php foreach($publications as $pub): ?>
										<div><a href="<?php echo get_permalink($pub['ID']) ?>?ref=<?php echo urlencode(get_permalink(get_the_ID())) ?>"><?php echo $pub['post_title'] ?></a></div>
									<?php endforeach ?>
								</div>
							</div>
						<?php endif; ?>

						<?php 
						$media = $staff->field('social-media'); 
						$media = explode(PHP_EOL, $media);
						if ($media[0]):
							?>
							<div class="form-group">
								<div class="col-sm-3 control-label"><span class="pull-left">On the web</span></div>
								<div class="col-sm-9">
									<?php foreach($media as $media): ?>
										<?php $media = explode('*', $media); ?>
										<a href="<?php echo $media[1] ?>" target="_blank" rel="nofollow" class="btn btn-default"><b class="fa fa-fw fa-<?php echo $media[0] == 'web' ? 'globe' : $media[0] ?>"></b> <?php echo $media[0] == 'web' ? 'Website' : ucfirst($media[0]) ?></a>
									<?php endforeach ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
					</div>
				</div>

			</div>
			<div class="col-lg-4"></div>
		</div>
	</section>

<?php get_footer() ?>