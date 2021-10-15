<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

get_header();
get_sidebar();
 ?>

	<div class="c1_all_content">



		<?php
			if ( is_single() ) {
				the_title( '<h1 class="c1_br3">', '</h1>' );
			}
		?>
<div class="c1_osn_content">

		<?php
		while ( have_posts() ) : the_post();


?>

<div class="c1_content_p im_f mt0">

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="c1_meta-nav">&rarr;</span>', 'casino' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="c1_screen-reader-text">"', '"</span>', false )
			) );











			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


        </div>






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




</div>


	</div><!-- #primary -->

<?php


get_footer();
