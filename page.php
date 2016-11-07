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

	<div class="col-md-<?php echo ( $alg_controller->has_left_side_bar() || $alg_controller->has_right_side_bar() ) ? '8' : '12'; ?>">

		<main id="content">

			<?php while ( have_posts() ) : the_post(); ?>


				<article class="page" id="pageid-<?php the_ID(); ?>">

					<?php do_action( 'basic_before_page_title' );  ?>

					<?php if ( ! has_shortcode( get_the_content(), 'a_legacy_genetics' ) ) { ?>
						<h1><?php the_title(); ?></h1>
						<div id="alg-under-title"></div>
					<?php } ?>

					<?php do_action( 'basic_after_page_title' );  ?>

					<?php do_action( 'basic_before_page_content_box' );  ?>
					<div class="entry-box clearfix">
						<?php do_action( 'basic_before_page_content' );  ?>
						<?php the_content(); ?>
						<?php do_action( 'basic_after_page_content' );  ?>
					</div>
					<?php do_action( 'basic_after_page_content_box' );  ?>

				</article>

				<?php

				if ( comments_open() || get_comments_number() ) { comments_template(); }

			endwhile; ?>

		</main>

	</div>

	<?php if ( $alg_controller->has_right_side_bar() ) { ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>

</div>

<?php get_footer(); ?>