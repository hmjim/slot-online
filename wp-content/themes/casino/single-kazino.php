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
				the_title( '<h1 class="br3">', '</h1>' );
			}
		?>
<div class="c1_all_content">

		<?php
		while ( have_posts() ) : the_post();


?>

<div class="c1_content_p im_f mt0">

<div class="c1_top_kazino">
    <div class="c1_top_kazino_l"><a href="<?php the_field('link_go'); ?>" target="_blank" title="<?php the_title(); ?>">
<img src="<?php the_post_thumbnail_url( "sk-small-img5" ); ?>" alt="<?php the_title(); ?>" /></a></div>
    <div class="c1_top_kazino_r"><span>Адрес казино: </span><?php the_field('adres_kaz'); ?></div>
    <div class="c1_top_kazino_r"><span>Язык(и): </span><?php the_field('lang'); ?></div>
    <div class="c1_top_kazino_r"><span>Год открытия: </span><?php the_field('y_go'); ?></div>
    <div class="c1_top_kazino_r"><span>Мин. депозит: </span><?php the_field('min_d'); ?></div>
    <div class="c1_top_kazino_r"><span>Софт слотов: </span><div><?php the_field('p_kazino'); ?></div></div>
    <div class="c1_top_kazino_r"><span>Платежи: </span><div><?php the_field('pays'); ?></div></div>
</div>

<a href="<?php the_field('link_go'); ?>" class="c1_go_pa" target="_blank" title="<?php the_title(); ?>"></a>


		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'casino' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );











			// If comments are open or we have at least one comment, load up the comment template.


		endwhile; // End of the loop.
		?>

        <a href="<?php the_field('link_go'); ?>" class="c1_go_pa" target="_blank" title="<?php the_title(); ?>"></a>

        </div>






		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'casino' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="c1_post-edit-link">',
				'</span>'
			);
		?>




</div>


	</div><!-- #primary -->

<?php


get_footer();
