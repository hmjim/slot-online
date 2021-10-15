<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

?>

<article id="c1_post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="c1_entry-header">
		<?php the_title( sprintf( '<h2 class="c1_entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="c1_entry-meta">
			<?php casino_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="c1_entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="c1_entry-footer">
		<?php casino_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
