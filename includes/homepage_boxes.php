<?php

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

<div class="wrap">

	<h1>
		Homepage Boxes
	</h1>

	<form method="post" action="options.php" autocomplete="off" id="ona-homepage-boxes-form">

		<?php

		settings_fields( 'a_legacy_genetics_settings' );
		do_settings_sections( 'a_legacy_genetics_settings' );

		?>

		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_PHONE; ?>" value="<?php echo esc_html( $alg_controller->getPhoneNumber() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_ADDRESS; ?>" value="<?php echo esc_html( $alg_controller->getAddress( FALSE ) ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_FACEBOOK; ?>" value="<?php echo esc_html( $alg_controller->getFacebookLink() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_TWITTER; ?>" value="<?php echo esc_html( $alg_controller->getTwitterLink() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_INSTAGRAM; ?>" value="<?php echo esc_html( $alg_controller->getInstagramLink() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_YOUTUBE; ?>" value="<?php echo esc_html( $alg_controller->getYouTubeLink() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION; ?>" value="<?php echo esc_html( $alg_controller->getCallToAction() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_REGISTER_LINK; ?>" value="<?php echo esc_html( $alg_controller->getRegisterLink() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_LIFETIME_FEE; ?>" value="<?php echo esc_html( $alg_controller->getLifetimeFee() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\Controller::OPTION_ANNUAL_FEE; ?>" value="<?php echo esc_html( $alg_controller->getAnnualFee() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\HoverCow::OPTION_NAME; ?>" value="<?php echo esc_html( \ALegacyGenetics\HoverCow::getOptionValue() ); ?>">
		<input type="hidden" id="ona-homepage-boxes" name="<?php echo \ALegacyGenetics\HomepageBox::OPTION_NAME; ?>">

	</form>

	<table class="table table-bordered table-striped">
		<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th>Link</th>
			<th>Link Text</th>
		</tr>
		</thead>
		<?php for ( $x=1; $x<=3; $x++ ) { ?>
			<?php $homepage_box = new \ALegacyGenetics\HomepageBox( $x ); ?>
			<tr>
				<td>
					<input id="homepage-box-title-<?php echo $x; ?>" class="form-control" value="<?php echo esc_html( $homepage_box->getTitle() ); ?>">
				</td>
				<td>
					<textarea id="homepage-box-content-<?php echo $x; ?>" class="form-control"><?php echo esc_html( $homepage_box->getContent() ); ?></textarea>
				</td>
				<td>
					<input id="homepage-box-link-<?php echo $x; ?>" class="form-control" value="<?php echo esc_html( $homepage_box->getLink() ); ?>">
				</td>
				<td>
					<input id="homepage-box-link-text-<?php echo $x; ?>" class="form-control" value="<?php echo esc_html( $homepage_box->getLinkText() ); ?>">
				</td>
			</tr>
		<?php } ?>
	</table>

	<?php submit_button( 'Save Changes', 'primary ona-homepage-boxes-submit' ); ?>

</div>