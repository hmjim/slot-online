<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		//if ( have_posts() ) :

		if ( is_home() ) { ?>
			<?php dynamic_sidebar( 'index-widget-top' ); ?>


			<?php
		} else {
			?>
            <h1 class="c1_br3"><?php single_post_title(); ?></h1>

		<?php } ?>

        <div class="c1_osn_content">


			<?php

			//if(is_home()){

			$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			//query_posts("paged=$page");

			$wp_query = null;

			print_r( $wp_query );

			$wp_query = new WP_Query( 'post_type=igrovue-avtomatu&posts_per_page=54&paged=' . $page );


			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				get_template_part( 'template-parts/content', 'igrovue-avtomatu' );
			endwhile;
			//}

			if ( function_exists( 'wp_corenavi' ) ) {
				wp_corenavi();
			}


			wp_reset_postdata();
			//wp_reset_query();


			//get_template_part( 'template-parts/content', 'none' );

			//endif;

			?>
        </div>


		<?php

		//if (is_home()) {
		?>

		<?php dynamic_sidebar( 'index-widget-bottom' ); ?>

		<?php //} ?>


    </div>

<?php


get_footer();



