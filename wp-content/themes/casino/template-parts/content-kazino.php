<?php
$output_html_curr_link_img2 = get_the_post_thumbnail_url( $post->ID );
$output_html_curr_link_img2 = str_replace( 'https://sloti-onlinuus.me/wp-content/uploads/', '//sloti-onlinuus.me/wp-content/uploads/', $output_html_curr_link_img2 );

?>
<div class="c1_d_0 c1_br3">
    <div class="c1_d_1"><?php echo $d; ?></div>
    <div class="c1_d_2"><a href="<?php the_field( 'link_go' ); ?>" target="_blank"><img src="<?php echo $output_html_curr_link_img2; ?>" alt="<?php the_title(); ?>"/></a></div>
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