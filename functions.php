<?php
/**
 * travcon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travcon
 */

if ( ! function_exists( 'travcon_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travcon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on travcon, use a find and replace
		 * to change 'travcon' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travcon', get_template_directory() . '/languages' );

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
		** Change backend logo
		*/
		function tlc_login_logo() { ?>
			<style type="text/css">
				#login h1 a, .login h1 a {
					background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/travcon/logo.png);
					padding-bottom: 30px;
					background-size: contain;
					width: auto !important;
					height: auto;
				}
			</style>
		<?php }
		add_action( 'login_enqueue_scripts', 'tlc_login_logo' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'travcon' ),
		) );

		// Add dropdown arrow to the parent menu items with sub menu items
		function be_arrows_in_menus( $item_output, $item, $depth, $args ) {
			if( in_array( 'menu-item-has-children', $item->classes ) ) {
				$arrow = 0 == $depth ? '<span class="fa fa-angle-down"></span>' : '';
				$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
			}
			return $item_output;
		}
		add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );

		// Add css to admin dashboard
		add_action('admin_head', 'tlc_admin_css');

		function tlc_admin_css() {
			echo '<style>
				#adminmenu .wp-menu-image img {
					width: 50%;
					height: auto;
				}
			</style>';
		}

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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travcon_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'travcon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travcon_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travcon_content_width', 640 );
}
add_action( 'after_setup_theme', 'travcon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travcon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travcon' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travcon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travcon_widgets_init' );

/* Start add time date on main slider */
function tt_current_date(){
  date_default_timezone_set( 'Asia/Colombo' );

  return date('m/d');
}
add_shortcode( 'tt_date', 'tt_current_date' );

// function tt_current_time(){
//   date_default_timezone_set( 'Asia/Colombo' );

//   return date('h:i:A');
// }
// add_shortcode( 'tt_time', 'tt_current_time' );
/* End add time date on main slider */

/**
 * Custom Pagination
 */
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

    if (empty($pagerange)) {
        $pagerange = 5;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default quries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
            $numpages = 1;
        }
    }


    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $numpages,
        'prev_next' => false,
        'type'  => 'array',
        'prev_next'   => TRUE,
        'prev_text'    => __('<i class="fa fa-long-arrow-left"></i>'),
        'next_text'    => __('<i class="fa fa-long-arrow-right"></i>'),
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="cp_content color-4">';
        foreach ( $pages as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul>';
    }

}

/**
 * ACF Pro theme options.
 */
if( function_exists('acf_add_options_page') ) {
	
	$options_img = get_template_directory_uri() . "/assets/img/travcon/dashboard-icons/options.png";

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'icon_url' => $options_img,
    'position' => 25
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-options'
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-options'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Preloader',
		'menu_title'	=> 'Preloader',
		'parent_slug'	=> 'theme-options'
	));
	
}

/**
* Tynymce table class selector
*/
function bootstrap_classes_tinymce($settings)
{
    $styles = array(
        array(
            'title' => 'None',
            'value' => ''
        ),
        array(
            'title' => 'Table',
            'value' => 'table',
        ),
        array(
            'title' => 'Striped',
            'value' => 'table table-striped',
        ),
        array(
            'title' => 'Bordered',
            'value' => 'table table-bordered',
        ),
    );
 
    $settings['table_class_list'] = json_encode($styles);
 
    return $settings;
}
 
add_filter('tiny_mce_before_init', 'bootstrap_classes_tinymce');

/**
* Beautiful taxonomy filters
*/
function modify_filter_button($string){
    return '<i class="fa fa-search" aria-hidden="true"></i>';
}
add_filter('beautiful_filters_apply_button', 'modify_filter_button', 10, 1);

function modify_filter_heading($filter_heading){
    $filter_heading = 'Search Results for:';
    return $filter_heading;
}
add_filter('beautiful_filters_info_heading', 'modify_filter_heading');

/**
* Change wordpress sub menu class
*/
function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="dropmenu" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');

/**
* Contact form 7 sort countries alphabatically by label from listo plugin
*/
function sort_countries_by_label( $data, $options, $args ) {
    if ( ! $data )
        return $data;

    usort( $data, 'compare' );

    return $data;
}
function compare( $a, $b ) {
    if ( $a == $b )
        return 0;

    for ( $i = 0, $l = min( mb_strlen( $a ), mb_strlen( $b ) ); $i < $l; $i++ ) {
        $cmp = compare_char( mb_substr( $a, $i, 1 ), mb_substr( $b, $i, 1 ) );
        if ( $cmp != 0 ) {
            return $cmp;
        }
    }

    return (int) ( mb_strlen( $a ) > mb_strlen( $b ) );
}
function compare_char( $a, $b ) {
    $chars  = 'AÀÁÄÃÅBCÇDEÈÉÊËFGHIÌÍÎÏJKLMNOÒÓÔÖÕPQRSTUÙÚÛÜVWXYZ';
    $chars .= 'aàáäãåbcçdeèéêëfghiìíîïjklmnoòóôöõpqrstuùúûüvwxyz';

    $pos_a = mb_strpos( $chars, $a );
    $pos_b = mb_strpos( $chars, $b );

    if ( $pos_a === false )
        return (int) ( false !== $pos_b );

    return false === $pos_b ? -1 : ( $pos_a - $pos_b );
}
add_filter( 'wpcf7_form_tag_data_option', 'sort_countries_by_label', 11, 3 );

/**
 * Enqueue scripts and styles.
 */
function travcon_scripts() {
	wp_enqueue_style( 'travcon-style', get_stylesheet_uri() );

	wp_enqueue_script( 'travcon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'travcon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travcon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

