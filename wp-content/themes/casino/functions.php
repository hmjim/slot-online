<?php

/**
 * casino functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package casino
 */

if ( ! function_exists( 'casino_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function casino_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on casino, use a find and replace
		 * to change 'casino' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'casino', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'sk-small-img', 158, 118, true ); //Latest Posts_sk thumb
		add_image_size( 'sk-small-img2', 147, 68, true ); //Latest Posts_sk thumb
		add_image_size( 'sk-small-img3', 199, 134, true ); //Latest Posts_sk thumb
		add_image_size( 'sk-small-img4', 60, 60, true ); //Latest Posts_sk thumb
		add_image_size( 'sk-small-img5', 216, 216, true ); //Latest Posts_sk thumb
		add_image_size( 'sk-small-img6', 100, 50, true ); //Latest Posts_sk thumb

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			//'primary' => esc_html__( 'Primary', 'casino' ),
			'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
			'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'casino_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif;


add_action( 'after_setup_theme', 'casino_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function casino_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'casino_content_width', 640 );
}

add_action( 'after_setup_theme', 'casino_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function casino_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'casino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'casino' ),
		'before_widget' => '<section id="c1_%1$s" class="c1_widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c1_widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'casino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function casino_scripts() {
	wp_enqueue_style( 'casino-style', get_stylesheet_uri() );

	wp_enqueue_script( 'casino-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'casino-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'casino_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if(isset($_GET['page'])){
    $cur_pag = intval($_GET['page']);
  }else{
    $cur_pag = 0;
  }
  if ($cur_pag == 0){$current = 1;}else{$current = $cur_pag;}
  //$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['format'] = 'page/%#%/'; 
  $a['total'] = $max;
  $a['current'] = $current;
  $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"
  
  
*/

function wp_corenavi() {
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max   = $wp_query->max_num_pages;
	if ( ! $current = get_query_var( 'paged' ) ) {
		$current = 1;
	}
	$a['base']    = str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) );
	$a['total']   = $max;
	$a['current'] = $current;

	$total          = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size']  = 3; //сколько ссылок показывать слева и справа от текущей
	$a['end_size']  = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

	if ( $max > 1 ) {
		echo '<div class="c1_page_all">';
	}
	if ( $total == 1 && $max > 1 ) {
		$pages = '<div class="c1_page_name">Страницы:</div>' . "\r\n";
	}
	echo $pages . paginate_links( $a );
	if ( $max > 1 ) {
		echo '</div>';
	}
}


// Creating the widget
class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
			'wpb_widget',

			// Widget name will appear in UI
			__( 'Блок для главной', 'wpb_widget_domain' ),

			// Widget description
			array( 'description' => __( 'Текст вверху и снизу', 'wpb_widget_domain' ), )
		);
	}

// Creating widget front-end
// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$text  = apply_filters( 'widget_text', $instance['text'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( ! empty( $text ) ) {
			echo $args['before_text'] . $text . $args['after_text'];
		}

		// This is where you run the code and display the output
		//echo __( 'Hello, World!', 'wpb_widget_domain' );
		echo $args['after_widget'];
	}

// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Заголовок', 'wpb_widget_domain' );
		}

		if ( isset( $instance['text'] ) ) {
			$text = $instance['text'];
		} else {
			$text = __( 'Текст', 'wpb_widget_domain' );
		}

// Widget admin form
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="c1_widefat" id="c1_<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>">Текст:</label>
            <textarea name="<?php echo $this->get_field_name( 'text' ); ?>"
                      id="c1_<?php echo $this->get_field_id( 'text' ); ?>" rows="16" cols="20"
                      class="c1_widefat"><?php echo esc_attr( $text ); ?></textarea>
        </p>

		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';

		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );


register_sidebar( array(
	'name'          => __( 'На главной' ),
	'id'            => 'index-widget-top',
	'description'   => __( 'Верхняя часть' ),
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h1 class="c1_br3">',
	'after_title'   => '</h1>',
	'before_text'   => '<div class="c1_cat_desc">',
	'after_text'    => '</div>',
) );

register_sidebar( array(
	'name'          => __( 'На главной' ),
	'id'            => 'index-widget-bottom',
	'description'   => __( 'Нижняя часть' ),
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h2 class="c1_br3">',
	'after_title'   => '</h2>',
	'before_text'   => '<div class="c1_cat_desc">',
	'after_text'    => '</div>',
) );

register_sidebar( array(
	'name'          => __( 'На странице рейтинга казино' ),
	'id'            => 'casino-widget-bottom',
	'description'   => __( 'Нижняя часть' ),
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h2 class="c1_br3">',
	'after_title'   => '</h2>',
	'before_text'   => '<div class="c1_cat_desc">',
	'after_text'    => '</div>',
) );


//add_action('init', 'do_rewrite');
//function do_rewrite(){
// Правило перезаписи
//add_rewrite_rule( '^igrovue-avtomatu/?', '?post_type=igrovue-avtomatu', 'top' );


//}


function trim_title_chars( $count, $after ) {
	$title = get_the_title();
	if ( mb_strlen( $title ) > $count ) {
		$title = mb_substr( $title, 0, $count );
	} else {
		$after = '';
	}
	echo $title . $after;
}

function trim_content_chars( $count, $after ) {
	$content = get_the_content();

	$search = array( "'<img[^>]*?>'si" );                    // интерпретировать как php-код

	$replace = array( "" );

	$content = preg_replace( $search, $replace, $content );

	if ( mb_strlen( $content ) > $count ) {
		$content = mb_substr( $content, 0, $count );
	} else {
		$after = '';
	}
	echo $content . $after;
}

function show_avtomat( $atts ) {
	extract( shortcode_atts( array(
		"id"    => '14',//,
		"float" => 'left'
		//"title" => 'Main View – блог о веб дизайне и веб разработке'
	), $atts ) );
	$args = array(
		'p'           => $id,
		'post_type'   => array( 'igrovue-avtomatu' ),
		'post_status' => array( 'publish' ),
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();


			$data = '<div class="c1_on_avt" style="float: ' . $float . '!important;">';
			$data .= '<a href="' . get_post_permalink() . '" title="' . get_the_title() . '">';
			$data .= '<div class="c1_im"><img src="' . get_the_post_thumbnail_url( '', "sk-small-img1" ) . '" alt="' . get_the_title() . '"></div>';
			$data .= '</a>';
			$data .= '</div>';
		}
	}

	// Restore original Post Data
	wp_reset_postdata();

	return $data;
}

add_shortcode( 'show_avtomat', 'show_avtomat' );


function my_home_category( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'post_type', 'igrovue-avtomatu' );
	}
}

add_action( 'pre_get_posts', 'my_home_category' );


function create_meta_desc() {
	if ( $_SERVER['REQUEST_URI'] == '/online-kazino/' || $_SERVER['REQUEST_URI'] == '/igrovue-avtomatu/' || $_SERVER['REQUEST_URI'] == '/stati/' || $_SERVER['REQUEST_URI'] == '/novosti/' ) {
		$url        = substr( $_SERVER['REQUEST_URI'], 1, - 1 );
		$obj        = get_post_type_object( $url );
		$title_desc = explode( "#", $obj->description );
		if ( strlen( $title_desc['0'] ) > 1 ) {
			echo "<title>" . $title_desc['0'] . "</title>";
			remove_theme_support( 'title-tag' );
		}
		if ( strlen( $title_desc['1'] ) > 1 ) {
			echo "<meta name='description' content='" . $title_desc['1'] . "' />";
		}

	}
}

add_action( 'wp_head', 'create_meta_desc', 0 );


add_filter( 'wp_get_attachment_url', 'clrs_get_attachment_url', 10, 2 );

function clrs_get_attachment_url( $url, $post_id ) {

	return str_replace( 'https://slots-onlinus.azurewebsites.net', '//sloti-onlinuus.me', $url );
}


add_filter( 'the_content', 'change_image_url' );

function change_image_url( $content ) {
	return str_replace( '//sloti-onlinuus.me/wp-content/uploads/', '//sloti-onlinuus.me/wp-content/uploads/', $content );
}

//add_action('wp_head', function(){ remove_theme_support( 'title-tag' ); }, 0);
//remove_action('wp_head', 'title'); 
/*

function mayak_wp_title($title){
$title = trim(preg_replace('/&(.+?);/','',$title));
return $title.' |ll '.esc_attr(get_bloginfo('name'));
}
add_filter('wp_title', 'mayak_wp_title');*/


/**
 * =============================================================================
 *
 * =============================================================================
 *
 * @author <panevnyk.roman@gmail.com>
 * @since  1.0
 * @return Void
 */
class Sync_data {

	/**
	 * -------------------------------------------------------------------------
	 * All needed action and filters keep here
	 * -------------------------------------------------------------------------
	 * @method __construct
	 *
	 * @param  Null
	 *
	 * @author <panevnyk.roman@gmail.com>
	 * @since  1.0
	 * @return Void
	 */
	public function __construct() {

		add_filter( 'wp_handle_upload', [ $this, 'handle_upload' ], 10, 2 );

	}

	/**
	 * -------------------------------------------------------------------------
	 *  Method to handle loaded image
	 * -------------------------------------------------------------------------
	 * @method handle_upload
	 *
	 * @param  Null
	 *
	 * @author <panevnyk.roman@gmail.com>
	 * @since  1.0
	 * @return Void
	 */
	public function handle_upload( $upload ) {

		$actual_folders = [
			'main'   => 'top.s-onlinus.net',
			'cloack' => 'slots-onlinus.azurewebsites.net'
		];

		$mirror = str_replace(
			$actual_folders['main'],
			$actual_folders['cloack'],
			$upload['file']
		);

		$image = imagecreatefromstring( file_get_contents( $upload['file'] ) );

		imagejpeg( $image, $mirror );
		imagedestroy( $image );

		return $upload;

	}


}

$data = new Sync_data();


/**
 * ==============================================================================
 * Rewrite rule redirects
 * ==============================================================================
 */
function goto_handler() {

	switch ( $_SERVER['REQUEST_URI'] ) {

		case '/cas/game4money' :
			{
				$location = 'https://directplay4win.com/landingpages/vulkan24gift/index.php?refCode=wp_w3004p162_olnusmoney';
				break;
			}

		case '/cas/vulkan' :
			{
				$location = 'https://mobywin7.com/?s=35&ref=wp_w3004p43_onlinus&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/eldorado' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_onlinustop&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/demo' :
			{
				$location = 'https://mobywin7.com/?s=53&ref=wp_w3004p162_onlinusdemo';
				break;
			}

		case '/cas/goldfishka' :
			{
				$location = 'https://govru.go-2.link/go/Pele?p16999p255253p7531&subid=onlnussuperslots';
				break;
			}

		case '/cas/faraon' :
			{
				$location = 'https://mobywin7.com/?s=48&ref=wp_w3004p129_olinus&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/azartplay' :
			{
				$location = 'https://mobywin7.com/?s=45&ref=wp_w3004p122_onlusazartplay&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/joycasino' :
			{
				$location = 'https://mobywin7.com/?s=57&ref=wp_w3004p176_onlinus&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/vlk24' :
			{
				$location = 'https://mobywin7.com/?s=53&ref=wp_w3004p162_onlinus24&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/superslots' :
			{
				$location = 'https://go-link1.com/go/j8?p16999p276041p18b7';
				break;
			}

		case '/cas/lotoru' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_onlinsk&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/slotozalcas' :
			{
				$location = 'https://mobywin7.com/?s=8&ref=wp_w3004p8_slot-onlin&url&url=%23registration';
				break;
			}

		case '/cas/pobeda' :
			{
				$location = 'https://mobywin7.com/?s=45&ref=wp_w3004p122_slotonlinuz&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/million' :
			{
				$location = 'https://trafiktrf.com/9747/3?l=173&param1=sltonlinusmil';
				break;
			}

		case '/cas/4empion' :
			{
				$location = 'https://trafictrf.com/9747/109?l=730&param1=xonlinus';
				break;
			}

		case '/cas/admiral' :
			{
				$location = 'https://mobywin7.com/?s=45&ref=wp_w3004p122_onlinus&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/admiral2' :
			{
				$location = 'https://trftocsn.com/9747/71?l=712&param1=onlinusadmiralend';
				break;
			}

		case '/cas/jackpot' :
			{
				$location = 'https://trftocsn.com/9747/2?l=171&param1=slotonlinusjack';
				break;
			}

		case '/cas/europa' :
			{
				$location = 'https://ch1dnw1bmst.com/TCKS';
				break;
			}

		case '/cas/colambus' :
			{
				$location = 'https://trftocsn.com/9747/71?l=712&param1=onlinusadmiralend';
				break;
			}

		case '/cas/vulkan-delux' :
			{
				$location = 'https://mobywin7.com/?s=55&ref=wp_w3004p169_onlinus&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/casino-x' :
			{
				$location = 'https://trafictrf.com/9747/109?l=730&param1=xonlinus';
				break;
			}

		case '/cas/rox-casino' :
			{
				$location = 'https://rox-jsukuqjxx.com/cb7eeb134';
				break;
			}

		case '/cas/booi' :
			{
				$location = 'https://74k03y4usc.com/alt/booi/ru/?71bc428f98e67dc36ddbccb1198fc612';
				break;
			}

		case '/cas/riobet' :
			{
				$location = 'https://tracker-pm2.rioaffiliates.com/link?btag=2601350_86929';
				break;
			}

		case '/cas/playfortuna' :
			{
				$location = 'https://85jtg3.com/alt/playfortuna/?0aeac175b5716eda8225ec6b32b724b7';
				break;
			}

		case '/cas/gms-deluxe' :
			{
				$location = 'https://mobywin7.com/?s=39&ref=wp_w3004p46_onlinus&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/fresh-casino' :
			{
				$location = 'https://fresh-xifzmheod.com/c49652687';
				break;
			}

		case '/cas/sol-casino' :
			{
				$location = 'https://sol-xkegxffnb.com/c0a00fcce';
				break;
			}

		case '/cas/iosvlk24' :
			{
				$location = 'https://mobywin7.com/?s=53&ref=wp_w3004p162_apponlinus&url=mob-app';
				break;
			}

		case '/cas/androidvlk24' :
			{
				$location = 'https://mobywin7.com/apk.php?s=53&ref=wp_w3004p162_apponlinusapk';
				break;
			}

		case '/cas/androidfaraon' :
			{
				$location = 'https://mobywin7.com/apk.php?s=48&ref=wp_w3004p129_apponlinus';
				break;
			}

		case '/cas/casino-delux' :
			{
				$location = 'https://govru.go-2.link/go/ZWKA?p16999p265664p38d8&subid=onlnus';
				break;
			}

		case '/cas/mostbet' :
			{
				$location = 'https://ch1dnw1bmst.com/A7FS';
				break;
			}

		case '/cas/pin-up' :
			{
				$location = 'https://nanopupref.com/5pouez16/?subId1=onlns';
				break;
			}

		case '/cas/vulkan-online' :
			{
				$location = 'https://mobywin7.com/?s=37&ref=wp_w3004p45_onlinusvip&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/azino-777' :
			{
				$location = 'https://ch1dnw1bmst.com/dRDS';
				break;
			}

		case '/cas/jet' :
			{
				$location = 'https://jtfr-sansevinc.com/ce51e35d4';
				break;
			}


	}

	if ( $location != '' ) {
		header( 'Location: ' . $location );
		exit;
	}

}

add_action( 'init', 'goto_handler', 1 );