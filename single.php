<?php

get_header();

/** @var \ALegacyGenetics\Controller $alg_controller */
global $alg_controller;

?>

<div class="row">

	<div class="col-md-8">

		<main id="content">

			<?php while (have_posts()) : the_post();

					get_template_part( 'content',  get_post_format() );

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

			endwhile; ?>

		</main>

	</div>
	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>