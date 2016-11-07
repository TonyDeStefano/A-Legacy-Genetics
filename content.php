<?php

$markup_opt = FALSE;
$markup     = ( is_single() && $markup_opt || false === $markup_opt ) ? true : false;

?>

<article <?php post_class(); ?><?php echo ( $markup ) ? ' itemscope itemtype="http://schema.org/Article"' : ''; ?>><?php

	if ( is_single() ) : ?>
		<h1<?php echo ( $markup ) ? ' itemprop="headline"' : ''; ?>><?php the_title(); ?></h1>
	<?php else: ?>
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php

	endif;

	/**
	 * @hooked basic_get_postmeta() - 10
	 */
	?>
	<div class="entry-box clearfix" <?php if ( $markup ) { echo "itemprop='articleBody'"; } ?>>

		<?php
		if ( ! is_single() ) { ?>
			<?php

			the_excerpt(); ?>
			<p class="more-link-box">
				<a class="more-link" href="<?php the_permalink() ?>#more-<?php the_ID(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Read more', 'a-legacy-genetics' ); ?></a>
			</p>
			<?php

		} else {

			the_content( '' );

		} ?>

	</div> <?php


	if ( is_single() ) { ?>
		<aside class="meta"><?php the_tags(); ?></aside>
	<?php }

	?>

</article>
