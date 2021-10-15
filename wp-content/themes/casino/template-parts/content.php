<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

?>

<article id="c1_post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="c1_entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="c1_entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="c1_entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="c1_entry-meta">
			<?php casino_posted_on(); ?>
		</div>
		<?php
		endif; ?>
	</header>

	<div class="c1_entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="c1_meta-nav">&rarr;</span>', 'casino' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="c1_screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="c1_page-links">' . esc_html__( 'Pages:', 'casino' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="c1_entry-footer">
		<?php casino_entry_footer(); ?>
	</footer>
</article> 
