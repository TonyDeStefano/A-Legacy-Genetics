<?php

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

</div>

<div id="alg-call-to-action" class="row hidden-xs">
	<h3>
		<?php echo $alg_controller->getCallToAction(); ?><br><br>
		<small>
			<?php echo $alg_controller->getCallToActionSub(); ?>
		</small>
	</h3>
</div>

<?php

$white_angus_bulls = \ALegacyGenetics\Controller::getCows( \ALegacyGenetics\Cow::COW_TYPE_WHITE_ANGUS );
$gyrlondo_bulls = \ALegacyGenetics\Controller::getCows( \ALegacyGenetics\Cow::COW_TYPE_GYRLONDO );

?>

<?php if ( count( $white_angus_bulls ) > 0 && count ( $gyrlondo_bulls ) > 0 ) { ?>

	<div class="row" id="white-angus-bulls">

		<?php if ( count( $white_angus_bulls ) > 0 ) { ?>
			<div class="col-md-12">
				<h3>White Angus Bulls</h3>
				<div id="alg-under-title"></div>
			</div>
		<?php } ?>
		<?php foreach ( $white_angus_bulls as $cow ) { ?>
			<div class="col-md-3 white-angus-bulls-cow">
				<?php if ( strlen( $cow->getThumbnail() ) ) { ?>
					<img class="img-thumbnail" src="<?php echo $cow->getThumbnail(); ?>">
				<?php } ?>
				<h4><?php echo $cow->getTitle(); ?></h4>
				<a href="<?php echo $cow->getUrl(); ?>" class="btn btn-yellow">Learn More</a>
				<hr class="visible-xs visible-sm">
			</div>
		<?php } ?>

		<?php if ( count( $gyrlondo_bulls ) > 0 ) { ?>
			<div class="col-md-12">
				<h3>Gyrolondo Bulls</h3>
				<div id="alg-under-title"></div>
			</div>
		<?php } ?>

		<?php if ( count( $gyrlondo_bulls ) <= 2 ) { ?>
			<div class="col-md-3"></div>
		<?php } ?>
		<?php foreach ( $gyrlondo_bulls as $cow ) { ?>
			<div class="col-md-3 white-angus-bulls-cow">
				<?php if ( strlen( $cow->getThumbnail() ) ) { ?>
					<img class="img-thumbnail" src="<?php echo $cow->getThumbnail(); ?>">
				<?php } ?>
				<h4><?php echo $cow->getTitle(); ?></h4>
				<a href="<?php echo $cow->getUrl(); ?>" class="btn btn-yellow">Learn More</a>
			</div>
		<?php } ?>
	</div>

<?php } ?>

<div id="alg-footer" class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-3 hidden-xs">
		<img src="<?php bloginfo('template_directory'); ?>/img/a-legacy-genetics-logo.png">
	</div>
	<div class="col-sm-4">
		<h3>Contact Us</h3>
		<p>
			<?php if ( strlen( $alg_controller->getPhoneNumber() ) > 0 ) { ?>
				<?php echo $alg_controller->getPhoneNumber(); ?><br>
			<?php } ?>
			<?php echo $alg_controller->getAddress(); ?>
			<?php if ( $alg_controller->hasSocialLinks() ) { ?>
				<br>
				<?php if ( strlen( $alg_controller->getFacebookLink() ) > 0 ) { ?>
					<a href="<?php echo $alg_controller->getFacebookLink(); ?>" target="_blank">
						<i class="fa fa-facebook-official fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $alg_controller->getTwitterLink() ) > 0 ) { ?>
					<a href="<?php echo $alg_controller->getTwitterLink(); ?>" target="_blank">
						<i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $alg_controller->getGooglePlusLink() ) > 0 ) { ?>
					<a href="<?php echo $alg_controller->getGooglePlusLink(); ?>" target="_blank">
						<i class="fa fa-google-plus fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $alg_controller->getInstagramLink() ) > 0 ) { ?>
					<a href="<?php echo $alg_controller->getInstagramLink(); ?>" target="_blank">
						<i class="fa fa-instagram fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $alg_controller->getYouTubeLink() ) > 0 ) { ?>
					<a href="<?php echo $alg_controller->getYouTubeLink(); ?>" target="_blank">
						<i class="fa fa-youtube fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
			<?php } ?>
		</p>
	</div>
	<div class="col-sm-4">
		<?php if ( strlen( $alg_controller->getPurchaseLink() ) > 0 ) { ?>
			<a href="<?php echo $alg_controller->getPurchaseLink(); ?>" class="btn btn-alg-buy">
				Purchase Semen
			</a>
		<?php } ?>
	</div>
</div>

<nav class="navbar navbar-inverse navbar-alg navbar-yellow hidden-sm hidden-xs">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-3" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-3" class="collapse navbar-collapse">
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

<div id="alg-copyright">
	&copy; 2016 A Legacy Genetics
</div>

<?php wp_footer(); ?>

</body>
</html>