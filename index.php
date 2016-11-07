<?php

get_header();

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

<div class="row">

	<div class="col-md-8">

		<main id="content">

			<?php if (have_posts()) :
				while (have_posts()) : the_post();

					get_template_part( 'content' );

				endwhile; ?>

				<?php

				the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __( '&laquo; Prev', 'a-legacy-genetics'),
					'next_text' => __( 'Next &raquo;', 'a-legacy-genetics'),
				) );

			else: ?>

				<div class="post clearfix">
				    <h2><?php _e( 'Posts not found', 'a-legacy-genetics' ); ?></h2>
				    <?php get_search_form(); ?>
				</div>

			<?php endif; ?>


		</main>

	</div>

	<div class="col-md-4">
	
		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>