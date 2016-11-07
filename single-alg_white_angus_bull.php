<?php

get_header();

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

	<div class="row">

		<?php if ( $alg_controller->has_left_side_bar() ) { ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>

		<div class="col-md-12">

			<main id="content">

				<?php while ( have_posts() ) : the_post(); ?>


					<article class="page" id="pageid-<?php the_ID(); ?>">

						<?php if ( ! has_shortcode( get_the_content(), 'a_legacy_genetics' ) ) { ?>
							<h1><?php the_title(); ?></h1>
							<div id="alg-under-title"></div>
						<?php } ?>

						<div class="row">

							<div class="col-md-8">

								<div class="entry-box clearfix">
									<?php the_content(); ?>
								</div>
							</div>

							<div class="col-md-4">

								<?php if ( strlen( get_the_post_thumbnail_url() ) > 0 ) { ?>

									<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive img-thumbnail">

								<?php } ?>

								<h4>White Angus Bulls</h4>
								<ul>
									<?php foreach ( \ALegacyGenetics\Controller::getCows( \ALegacyGenetics\Cow::COW_TYPE_WHITE_ANGUS ) as $cow ) { ?>
										<li>
											<a href="<?php echo $cow->getUrl(); ?>">
												<?php echo $cow->getTitle(); ?>
											</a>
										</li>
									<?php } ?>
								</ul>

								<h4>Gyrolondo Bulls</h4>
								<ul>
									<?php foreach ( \ALegacyGenetics\Controller::getCows( \ALegacyGenetics\Cow::COW_TYPE_GYRLONDO ) as $cow ) { ?>
										<li>
											<a href="<?php echo $cow->getUrl(); ?>">
												<?php echo $cow->getTitle(); ?>
											</a>
										</li>
									<?php } ?>
								</ul>

							</div>
						</div>



					</article>

					<?php

					if ( comments_open() || get_comments_number() ) { comments_template(); }

				endwhile; ?>

			</main>

		</div>

	</div>

<?php get_footer(); ?>