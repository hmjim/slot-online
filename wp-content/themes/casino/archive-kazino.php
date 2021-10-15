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


if ( have_posts() ) : ?>


	<?php
	echo '<h1 class="c1_br3">Онлайн казино на реальные деньги</h1>'; //the_archive_title( '<h1 class="c1_br3">', '</h1>' );
	the_archive_description( '<div class="c1_cat_desc">', '</div>' );
	?>

    <div class="c1_osn_content">

    <div class="c1_top_menu_kazino">
        <div class="c1_d_1">№</div>
        <div class="c1_d_2">Онлайн-казино</div>
        <div class="c1_d_3">Бонусы</div>
        <div class="c1_d_4">Кол-во автоматов</div>
        <div class="c1_d_3">Платформа казино</div>
        <div class="c1_d_6">Клиент</div>
        <div class="c1_d_5">Обзор</div>
        <div class="c1_d_7">Играть</div>
    </div>

    <div class="c1_top_all_kazino">




	<?php


	$args = array(
		'post_type'   => array( 'kazino' ),
		'post_status' => array( 'publish' ),
		'meta_key'    => 'sort',
		'orderby'     => 'meta_value_num',
		'order'       => 'ASC',
	);
	// The Query
	$query = new WP_Query( $args );


	$d = 0;

	while ( $query->have_posts() ) {
		$query->the_post();
		$d ++;

		$output_html_curr_link_img2 = get_the_post_thumbnail_url( $post->ID );
		$output_html_curr_link_img2 = str_replace( 'https://sloti-onlinuus.me/wp-content/uploads/', '//sloti-onlinuus.me/wp-content/uploads/', $output_html_curr_link_img2 );

		?>
        <div class="c1_d_0 c1_br3">
            <div class="c1_d_1"><?php echo $d; ?></div>
            <div class="c1_d_2"><a href="<?php the_field( 'link_go' ); ?>"target="_blank"><img src="<?php echo $output_html_curr_link_img2; ?>"
                                     alt="<?php the_title(); ?>"/></a></div>
            <div class="c1_d_3">
                <div><?php the_field( 'bonus' ); ?></div>
            </div>
            <div class="c1_d_4"><?php the_field( 'k_avt' ); ?></div>
            <div class="c1_d_3">
                <div><?php the_field( 'p_kazino' ); ?></div>
            </div>
            <div class="c1_d_6">
				<?php
				if ( get_field( 'klient' ) == 1 ) {
					echo '<div class="c1_ok"></div>';
				} else {
					echo '<div class="c1_not"></div>';
				}
				?>
            </div>
            <div class="c1_d_5">
                <a href="<?php echo get_post_permalink(); ?>" class="c1_but_c1" title="Обзор">Обзор</a>
            </div>
            <div class="c1_d_5">
                <a href="<?php the_field( 'link_go' ); ?>" class="c1_but_d1" target="_blank" title="Играть">Играть</a>
            </div>
        </div>

		<?php
		//get_template_part( 'template-parts/content', 'kazino' );

	}

	if ( function_exists( 'wp_corenavi' ) ) {
		wp_corenavi();
	}

	wp_reset_postdata();

	echo '</div></div>';

else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>


<?php dynamic_sidebar( 'casino-widget-bottom' ); ?>


    </div>
<?php

get_footer();
