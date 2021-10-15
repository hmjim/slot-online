<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package casino
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>












 <div class="c1_content" id="c1_sk_sid">
    <div class="c1_sitebar">
        <div class="c1_sitebar_title" id="c1_sk_if1">
            ТОП казино
        </div>
        <div class="c1_sitebar_all_rate_casino" id="c1_sk_if2">


<?php
	        $args = array (
            	'post_type'              => array( 'online-kazino' ),
            	'post_status'            => array( 'publish' ),
            	'posts_per_page'         => '14',
                'meta_key'               => 'sort',
                'orderby'                => 'meta_value_num',
                'order'                  => 'ASC',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {

  $d=0;

                		while ( $query->have_posts() ) {
                            		$query->the_post();
                                    ;
						if( get_the_ID() != 2383 && get_the_ID() != 2598 && get_the_ID() != 2963 && get_the_ID() != 1350){
							$d++
?>


            <a href="<?php echo get_post_permalink(); ?>" class="c1_sitebar_one_rate" title="<?php the_title(); ?>">
                <div class="c1_sitebar_rate_num c1_br3">
                    <?php echo $d; ?>
                </div>
                <div class="c1_sitebar_rate_logo c1_br3">
                    <img src="<?php the_post_thumbnail_url( "sk-small-img2" ); ?>" alt="<?php the_title(); ?>" class="c1_br3"/>
                </div>
            </a>


            <?php
						}
	               }
                  }
                 wp_reset_postdata();
            ?>
        </div>









        <div class="c1_sitebar_title_article2">
            Популярные автоматы
        </div>
        <div class="c1_sitebar_all_article2 .c1_mb20">


        <?php $args = array( 'post_type' => array( 'igrovue-avtomatu' ), 'post_status' => array( 'publish' ), 'posts_per_page' => 7, 'orderby' => 'rand' );
										$rand_posts = get_posts( $args );
										foreach( $rand_posts as $post ) : ?>
            <div class="c1_sitebar_one_article2">
            <div class="c1_sitebar_art_cont2">
            <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>">
                <img src="<?php the_post_thumbnail_url( "sk-small-img4" ); ?>" alt="<?php the_title(); ?>" class="c1_br3"/>
            </a>
                </div>
                <div class="c1_sitebar_art_title2">
                    <div>
                        <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>

            </div>
            									<?php endforeach; ?>

         									<?php wp_reset_postdata() ?>



        </div>





        <div class="c1_sitebar_title_article">
            Статьи
        </div>
        <div class="c1_sitebar_all_article">


        <?php
            // WP_Query arguments
            $args = array (
            	'post_type'              => array( 'stati' ),
            	'post_status'            => array( 'publish' ),
            	'posts_per_page'         => '4',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {


                		while ( $query->have_posts() ) {
                            		$query->the_post();
                    ?>
            <div class="c1_sitebar_one_article">
                <div class="c1_sitebar_art_title">
                    <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="c1_sitebar_art_cont">
<?php
            echo trim_content_chars(250, '...');
?>
                </div>
            </div>

            <?php

                            	}
                                }
                                wp_reset_postdata();

                        ?>


        </div>
    </div>
 </div>


	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

