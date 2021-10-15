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
				the_title( '<h1 class="c1_br3"> Игровой автомат ', ' на деньги </h1>' );
			}
		?>

<div class="c1_osn_content">

		<?php
		while ( have_posts() ) : the_post();


?>

<div class="c1_content_p mt0">

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
<div class="show-on-mobile">
<div align="center">
<a href="/cas/vlk24" class="button"/>Демо-игра</a>
</div>
</br>
</div>
<div class="hide-on-mobile">

        <?php if (get_field('flash-game')){?>
        <div class="c1_content_flash">
        <iframe src="<?php the_field('flash-game'); ?>" width="525" height="398"></iframe>
        </div>
        <?php } ?>


        <?php
            // WP_Query arguments
            $args = array (
            	'post_type'              => array( 'igrovue-avtomatu' ),
            	'post_status'            => array( 'publish' ),
            	'posts_per_page'         => '10',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {

        ?>



        <div class="c1_r_game">
            <div class="c1_custom-container vertical">
                <a href="#" class="c1_prev"> </a>
                <div class="c1_carousel">
                    <ul>


                    <?php
                		while ( $query->have_posts() ) {
                            		$query->the_post();
                    ?>

                        <li>
                            <div>
                                <a href="<?php echo get_post_permalink(); ?>" class="c1_sl_one" title="<?php the_title(); ?>">
                                <div class="c1_im"><img src="<?php the_post_thumbnail_url( "sk-small-img4" ); ?>" alt="<?php the_title(); ?>"></div>
                                <div class="c1_te"><div><?php trim_title_chars(25, '...'); ?></div></div>
                                </a>
                            </div>
                        </li>

                        <?php

                            	}

                        ?>


                    </ul>
                </div>
                <a href="#" class="c1_next"> </a>
                <div class="c1_clear"></div>
            </div>
        </div>
        </div>





        <?php


            }

            // Restore original Post Data
            wp_reset_postdata();
        ?>

        <script>

        $(".vertical .c1_carousel").jCarouselLite({
            visible: 5,
            btnNext: ".vertical .c1_next",
            btnPrev: ".vertical .c1_prev",
            vertical: true,
            auto: 3500,
            speed: 700,
            mouseWheel: true
        });

        </script>


         <?php if (get_field('link_game_pay')){?>
            <a href="<?php the_field('link_game_pay'); ?>" class="c1_go_p" target="_blank" title="Играть в автомат <?php the_title(); ?> на деньги"></a>
         <?php } ?>

        <div class="c1_ee_rt">
            <span>Поделиться:</span>
            <script type="text/javascript">(function() {
              if (window.pluso)if (typeof window.pluso.start == "function") return;
              if (window.ifpluso==undefined) { window.ifpluso = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                var h=d[g]('body')[0];
                h.appendChild(s);
              }})();</script>
            <div class="pluso" data-background="transparent" data-options="big,round,line,horizontal,nocounter,theme=04" data-services="vkontakte,facebook,google,twitter"></div>
        </div>
        <?php

if(get_field('desc_game')){ ?>
<?php
 $output_html_curr_link_img = get_field('desc_game');
 $output_html_curr_link_img = str_replace( 'slotzz-onlinuzz.ey.r.appspot.com/wp-content/uploads/', 'sloti-onlinuus.me/wp-content/uploads/', $output_html_curr_link_img );
?>
<div class="c1_cat_desc mt0"><?php echo $output_html_curr_link_img; ?></div>
<?php } ?>
 </div>


	</div><!-- #primary -->

<?php


get_footer();
