<?php

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

<div class="wrap">

	<h1>
		Hover Cow
	</h1>

	<div class="row">
		<div class="col-md-6">

			<div id="ona-silhouette">
				<img src="<?php bloginfo('template_directory'); ?>/img/silhouette.png">
				<?php for ( $x = 1; $x <= 12; $x++ ) { ?>
					<div class="ona-silhouette-over ona-silhouette-over-<?php echo $x; ?>" data-id="<?php echo $x; ?>">
						<?php echo $x; ?>
					</div>
				<?php } ?>
			</div>

			<form method="post" action="options.php" autocomplete="off" id="ona-hover-cow-form">

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
				<input type="hidden" name="<?php echo \ALegacyGenetics\HomepageBox::OPTION_NAME; ?>" value="<?php echo esc_html( \ALegacyGenetics\HomepageBox::getOptionValue() ); ?>">
				<input type="hidden" id="ona-hover-cow" name="<?php echo \ALegacyGenetics\HoverCow::OPTION_NAME; ?>">

			</form>

			<?php submit_button( 'Save Changes', 'primary ona-hover-cow-submit' ); ?>

		</div>
		<div class="col-md-6">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Content</th>
					</tr>
				</thead>
				<?php for ( $x=1; $x<=12; $x++ ) { ?>
					<?php $hover_cow = new \ALegacyGenetics\HoverCow( $x ); ?>
					<tr>
						<td><?php echo $x; ?></td>
						<td>
							<input id="hover-cow-title-<?php echo $x; ?>" class="form-control" value="<?php echo esc_html( $hover_cow->getTitle() ); ?>">
						</td>
						<td>
							<textarea id="hover-cow-content-<?php echo $x; ?>" class="form-control"><?php echo esc_html( $hover_cow->getContent() ); ?></textarea>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>

</div>