<!DOCTYPE html>
<html lang="id-id">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php bloginfo('site_title') ?></title>
	<?php wp_head() ?>
</head>
<body>

	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php bloginfo('url') ?>">
						<img src="<?php echo get_template_directory_uri() ?>/images/logo.png" />
					</a>
				</div>
		
				<div class="collapse navbar-collapse" id="navbar-collapsible">
					<?php wp_nav_menu([
						'theme_location' => 'englishdept-header-menu',
						'menu_class' => 'nav navbar-nav'
						]) 
					?>
					<form role="search" method="get" class="navbar-form navbar-right" action="<?php bloginfo('url') ?>">
						<div class="form-group">
							<span class="sr-only">Search for</span>
							<div class="input-group">
								<input type="text" name="s"<?php if (isset($_GET['s'])): ?> value="<?php echo $_GET['s'] ?>"<?php endif ?> class="form-control" placeholder="Search and hit enter" />
								<span class="input-group-btn hidden-sm hidden-xs">
									<button type="submit" class="btn btn-default"><b class="fa fa-search fa-fw"></b></button>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</nav>