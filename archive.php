<?php get_header(); ?>
	<main id="content">

<?php if (have_posts()) :

	$post = $posts[0];
	$not_paged = get_query_var('paged');
	$not_paged = ( empty($not_paged) ) ? true : false;

	?>

	<header class="inform">
	<?php if (is_category()) : ?>
		<h1><?php _e( 'Category', 'a-legacy-genetics' ); ?> &laquo;<?php single_cat_title(''); ?>&raquo;</h1>
		<?php if ( $not_paged ) echo '<div class="archive-desc">'. category_description() .'</div>'; ?>
	<?php elseif( is_tag() ) : ?>
		<h1><?php _e( 'Tag', 'a-legacy-genetics' ); ?> &laquo;<?php single_tag_title(); ?>&raquo;</h1>
		<?php if ( $not_paged ) echo '<div class="archive-desc">'. tag_description() .'</div>'; ?>
	<?php elseif (is_day()) : ?>
		<h1><?php _e( 'Day archives:', 'a-legacy-genetics' ); ?> <?php the_time('F jS, Y'); ?></h1>
	<?php elseif (is_month()) : ?>
		<h1><?php _e( 'Monthly archives:', 'a-legacy-genetics' ); ?> <?php the_time('F, Y'); ?></h1>
	<?php elseif (is_year()) : ?>
		<h1><?php _e( 'Year archives:', 'a-legacy-genetics' ); ?> <?php the_time('Y'); ?></h1>
	<?php elseif (is_author()) : ?>
		<h1><?php _e( 'Author archives', 'a-legacy-genetics' ); ?></h1>
		<div class="archive-desc"><?php the_author_meta('description'); ?></div>
	<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
		<h1 class="arhivetitle"><?php _e( 'Archive', 'a-legacy-genetics' ); ?></h1>
 	<?php endif; ?>
	</header>

	<?php while (have_posts()) : the_post(); 

		get_template_part( 'content' ); 

	endwhile;

	the_posts_pagination( array(
		'mid_size' => 2,
		'prev_text' => __( '&laquo; Prev', 'a-legacy-genetics'),
		'next_text' => __( 'Next &raquo;', 'a-legacy-genetics'),
	) );


else: ?>
		
	<div class="post">
		<h1><?php _e( 'Posts not found', 'a-legacy-genetics' ); ?></h1>
		<?php get_search_form(); ?>
	 </div>
		
<?php endif; ?>

	</main> <!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>