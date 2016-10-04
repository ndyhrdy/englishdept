<?php get_header() ?>
<?php the_post() ?>

	<div class="jumbotron jumbotron-primary">
		<h1><?php the_title() ?></h1>
		<div><?php the_content() ?></div>
		
	</div>
	<section>
		<?php echo do_shortcode('[englishdept-staff-list]') ?>
	</section>

<?php get_footer() ?>