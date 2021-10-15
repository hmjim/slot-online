<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

?>


	
		<?php the_title( '<h1 class="c1_br3">', '</h1>' ); ?>
	

	<div class="c1_osn_content mt0">
        
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="c1_page-links">' . esc_html__( 'Pages:', 'casino' ),
				'after'  => '</div>',
			) );
		?>
    
	</div><!-- .entry-content -->


		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'casino' ),
					the_title( '<span class="c1_screen-reader-text">"', '"</span>', false )
				),
				'<span class="c1_edit-link">',
				'</span>'
			);
		?>


