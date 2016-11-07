<?php

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge" /><![endif]-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />

</head
<body <?php body_class(); ?>>

<nav class="navbar navbar-inverse navbar-alg navbar-green hidden-sm hidden-xs">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-1" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
				<?php foreach ( $alg_controller->get_menu_items( \ALegacyGenetics\Controller::MENU_SECONDARY ) AS $menu_item ) { ?>
					<li<?php if ( $menu_item->hasChildren() ) { ?> class="dropdown" <?php } ?>>
						<a href="<?php echo $menu_item->getUrl(); ?>"<?php if ( $menu_item->hasChildren() ) { ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"<?php } ?>>
							<?php echo $menu_item->getTitle(); ?>
								<?php if ( $menu_item->hasChildren() ) { ?>
								<span class="caret"></span>
							<?php } ?>
						</a>
						<?php if ( $menu_item->hasChildren() ) { ?>
							<ul class="dropdown-menu">
								<?php foreach ( $menu_item->getChildren() as $child ) { ?>
									<li>
										<a href="<?php echo $child->getUrl(); ?>">
											<?php echo $child->getTitle(); ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</li>
				<?php } ?>
				<?php if ( strlen( $alg_controller->getPhoneNumber() ) > 0 ) { ?>
					<li>
						<a href="tel:<?php echo $alg_controller->getPhoneNumber( TRUE ); ?>">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<?php echo $alg_controller->getPhoneNumber(); ?>
						</a>
					</li>
				<?php } ?>
			</ul>
			<?php if ( $alg_controller->hasSocialLinks() ) { ?>
				<ul class="nav navbar-nav navbar-right">
					<?php if ( strlen( $alg_controller->getFacebookLink() ) > 0 ) { ?>
						<li>
							<a href="<?php echo $alg_controller->getFacebookLink(); ?>" target="_blank">
								<i class="fa fa-facebook-official fa-fw" aria-hidden="true"></i>
							</a>
						</li>
					<?php } ?>
					<?php if ( strlen( $alg_controller->getTwitterLink() ) > 0 ) { ?>
						<li>
							<a href="<?php echo $alg_controller->getTwitterLink(); ?>" target="_blank">
								<i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
							</a>
						</li>
					<?php } ?>
					<?php if ( strlen( $alg_controller->getGooglePlusLink() ) > 0 ) { ?>
						<li>
							<a href="<?php echo $alg_controller->getGooglePlusLink(); ?>" target="_blank">
								<i class="fa fa-google-plus fa-fw" aria-hidden="true"></i>
							</a>
						</li>
					<?php } ?>
					<?php if ( strlen( $alg_controller->getInstagramLink() ) > 0 ) { ?>
						<li>
							<a href="<?php echo $alg_controller->getInstagramLink(); ?>" target="_blank">
								<i class="fa fa-instagram fa-fw" aria-hidden="true"></i>
							</a>
						</li>
					<?php } ?>
					<?php if ( strlen( $alg_controller->getYouTubeLink() ) > 0 ) { ?>
						<li>
							<a href="<?php echo $alg_controller->getYouTubeLink(); ?>" target="_blank">
								<i class="fa fa-youtube fa-fw" aria-hidden="true"></i>
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</nav>

<div id="alg-logo">
	<a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/a-legacy-genetics-logo.png"></a>
</div>

<nav class="navbar navbar-inverse navbar-alg navbar-yellow">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-2" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-2" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php foreach ( $alg_controller->get_menu_items( \ALegacyGenetics\Controller::MENU_MAIN ) AS $menu_item ) { ?>
					<li<?php if ( $menu_item->hasChildren() ) { ?> class="dropdown" <?php } ?>>
						<a href="<?php echo $menu_item->getUrl(); ?>"<?php if ( $menu_item->hasChildren() ) { ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"<?php } ?>>
							<?php echo $menu_item->getTitle(); ?>
								<?php if ( $menu_item->hasChildren() ) { ?>
								<span class="caret"></span>
							<?php } ?>
						</a>
						<?php if ( $menu_item->hasChildren() ) { ?>
							<ul class="dropdown-menu">
								<?php foreach ( $menu_item->getChildren() as $child ) { ?>
									<li>
										<a href="<?php echo $child->getUrl(); ?>">
											<?php echo $child->getTitle(); ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<?php if ( is_front_page() ) { ?>

	<?php

	$white_angus = \ALegacyGenetics\Controller::getCows( \ALegacyGenetics\Cow::COW_TYPE_WHITE_ANGUS );
	$gyrolondo =  \ALegacyGenetics\Controller::getCows( \ALegacyGenetics\Cow::COW_TYPE_GYRLONDO );
	$cows = [];
	foreach ( $white_angus as $cow )
	{
		$cows[] = $cow;
	}
	foreach ( $gyrolondo as $cow )
	{
		$cows[] = $cow;
	}

	foreach ( $cows as $index => $cow )
	{
		if ( strlen( $cow->getImage() ) == 0 )
		{
			unset( $cows[ $index ] );
		}
	}

	?>

	<?php if ( count( $cows ) > 0 ) { ?>
		<div id="cow-slider" class="hidden-xs">
			<?php $count = 0; ?>
			<?php foreach ( $cows as $cow ) { ?>
				<div data-index="<?php echo $count; ?>" class="cow-slide cow-slide-<?php echo $count; ?>">
					<img src="<?php echo $cow->getImage(); ?>">
				</div>
				<?php $count++; ?>
			<?php } ?>
			<div class="cow-slider-arrow cow-slider-arrow-left">
				<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
			</div>
			<div class="cow-slider-arrow cow-slider-arrow-right">
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
			</div>
		</div>
	<?php } ?>

<?php } ?>

<div class="alg-content">