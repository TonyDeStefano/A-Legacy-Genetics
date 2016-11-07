<?php

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

<div class="wrap">

	<h1>
		ONA White Angus Settings
	</h1>

	<form method="post" action="options.php" autocomplete="off" id="ona-hover-cow-form">

		<?php

		settings_fields( 'a_legacy_genetics_settings' );
		do_settings_sections( 'a_legacy_genetics_settings' );

		?>

		<input type="hidden" name="<?php echo \ALegacyGenetics\HoverCow::OPTION_NAME; ?>" value="<?php echo esc_html( \ALegacyGenetics\HoverCow::getOptionValue() ); ?>">
		<input type="hidden" name="<?php echo \ALegacyGenetics\HomepageBox::OPTION_NAME; ?>" value="<?php echo esc_html( \ALegacyGenetics\HomepageBox::getOptionValue() ); ?>">

		<table class="form-table table table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Current Value</th>
					<th>Change To</th>
				</tr>
			</thead>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_PHONE; ?>">
						Phone Number
					</label>
				</th>
				<td>
					<?php echo $alg_controller->getPhoneNumber(); ?>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_PHONE; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_PHONE; ?>"
						value="<?php echo esc_html( $alg_controller->getPhoneNumber() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_ADDRESS; ?>">
						Address
					</label>
				</th>
				<td>
					<?php echo $alg_controller->getAddress(); ?>
				</td>
				<td>
					<textarea
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_ADDRESS; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_ADDRESS; ?>"><?php echo esc_html( $alg_controller->getAddress( FALSE ) ); ?></textarea>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_FACEBOOK; ?>">
						Facebook Link
					</label>
				</th>
				<td>
					<a href="<?php echo $alg_controller->getFacebookLink(); ?>" target="_blank"><?php echo $alg_controller->getFacebookLink(); ?></a>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_FACEBOOK; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_FACEBOOK; ?>"
						value="<?php echo esc_html( $alg_controller->getFacebookLink() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_TWITTER; ?>">
						Twitter Link
					</label>
				</th>
				<td>
					<a href="<?php echo $alg_controller->getTwitterLink(); ?>" target="_blank"><?php echo $alg_controller->getTwitterLink(); ?></a>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_TWITTER; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_TWITTER; ?>"
						value="<?php echo esc_html( $alg_controller->getTwitterLink() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_GOOGLE; ?>">
						Google+ Link
					</label>
				</th>
				<td>
					<a href="<?php echo $alg_controller->getGooglePlusLink(); ?>" target="_blank"><?php echo $alg_controller->getGooglePlusLink(); ?></a>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_GOOGLE; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_GOOGLE; ?>"
						value="<?php echo esc_html( $alg_controller->getGooglePlusLink() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_INSTAGRAM; ?>">
						Instagram Link
					</label>
				</th>
				<td>
					<a href="<?php echo $alg_controller->getInstagramLink(); ?>" target="_blank"><?php echo $alg_controller->getInstagramLink(); ?></a>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_INSTAGRAM; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_INSTAGRAM; ?>"
						value="<?php echo esc_html( $alg_controller->getInstagramLink() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_YOUTUBE; ?>">
						YouTube Link
					</label>
				</th>
				<td>
					<a href="<?php echo $alg_controller->getYouTubeLink(); ?>" target="_blank"><?php echo $alg_controller->getYouTubeLink(); ?></a>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_YOUTUBE; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_YOUTUBE; ?>"
						value="<?php echo esc_html( $alg_controller->getYouTubeLink() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION; ?>">
						Call to Action Text
					</label>
				</th>
				<td>
					<?php echo $alg_controller->getCallToAction(); ?>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION; ?>"
						value="<?php echo esc_html( $alg_controller->getCallToAction() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION_SUB; ?>">
						Call to Action Sub-Text
					</label>
				</th>
				<td>
					<?php echo $alg_controller->getCallToActionSub(); ?>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION_SUB; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_CALL_TO_ACTION_SUB; ?>"
						value="<?php echo esc_html( $alg_controller->getCallToActionSub() ); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo \ALegacyGenetics\Controller::OPTION_PURCHASE_LINK; ?>">
						Purchase Link
					</label>
				</th>
				<td>
					<?php echo $alg_controller->getPurchaseLink(); ?>
				</td>
				<td>
					<input
						type="text"
						class="form-control"
						id="<?php echo \ALegacyGenetics\Controller::OPTION_PURCHASE_LINK; ?>"
						name="<?php echo \ALegacyGenetics\Controller::OPTION_PURCHASE_LINK; ?>"
						value="<?php echo esc_html( $alg_controller->getPurchaseLink() ); ?>">
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>

	</form>

</div>