<?php
/**
 * akashanepal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package akashanepal
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Define URL Location Constants
 */
define( 'Akashanepal_PARENT_URL', get_template_directory_uri() );
define( 'Akashanepal_LIBRARY_URL', Akashanepal_PARENT_URL. '/assets/library' );
define( 'Akashanepal_CSS_URL', Akashanepal_PARENT_URL . '/assets/css' );
define( 'Akashanepal_JS_URL', Akashanepal_PARENT_URL . '/assets/js' );
define( 'Akashanepal_IMAGES_URL', Akashanepal_PARENT_URL . '/assets/images' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function akashanepal_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on akashanepal, use a find and replace
		* to change 'akashanepal' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'akashanepal', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-nav' => esc_html__( 'Primary Menu', 'akashanepal' ),
			'top-menu' => esc_html__( 'Top Menu', 'akashanepal' ),
			'quick-link' => esc_html__( 'Quick Links', 'akashanepal' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'akashanepal_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'akashanepal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function akashanepal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'akashanepal_content_width', 640 );
}
add_action( 'after_setup_theme', 'akashanepal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function akashanepal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'akashanepal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'akashanepal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'akashanepal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function akashanepal_scripts() {
	wp_enqueue_style( 'Google_font', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&family=Oswald:wght@200;300;400;500;600;700&display=swap', array(), null );
	// wp_enqueue_style( 'bundle-css', '//unpkg.com/swiper@8/swiper-bundle.min.css', array(), null );
	// wp_enqueue_style( 'fontawesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), null );

	wp_enqueue_style( 'fontawesome-css', '//fonts.googleapis.com', array(), null );
	wp_enqueue_style( 'fontawesome-css', '//fonts.gstatic.com', array(), null );
	wp_enqueue_style( 'fontawesome-css', '//fonts.googleapis.com', array(), null );
	wp_enqueue_style( 'fontawesome-css', '//fonts.gstatic.com"', array(), null );
	// Load stylesheet
	// wp_enqueue_style( 'bootstrap-css', Akashanepal_LIBRARY_URL .'/bootstrap/css/bootstrap.min.css');
	// wp_enqueue_style( 'fontawesome', Akashanepal_LIBRARY_URL .'/fontawesome/font-awesome.min.css');
	// wp_enqueue_style( 'fancybox', Akashanepal_LIBRARY_URL . '/fancybox/dist/jquery.fancybox.min.css' );
	// wp_enqueue_style( 'slickslider', Akashanepal_LIBRARY_URL . '/slick/slick.css' );
	// wp_enqueue_style( 'slicktheme', Akashanepal_LIBRARY_URL . '/slick/slick-theme.css' );
	
	// Load javascript
	wp_enqueue_script( 'mainjs', Akashanepal_JS_URL . '/jquery-3.6.0.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'popper-js', '//cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', array(), 'all' );
	wp_enqueue_script( 'popper-js', '//cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js', array(), 'all' );
	wp_enqueue_script( 'popper-js', '//unpkg.com/swiper@8/swiper-bundle.min.js', array(), 'all' );

	// wp_enqueue_script( 'bootstrap-js', Akashanepal_LIBRARY_URL . '/bootstrap/js/bootstrap.min.js', array(), rand(111, 9999), 'all' );
	// wp_enqueue_script( 'fancybox', Akashanepal_LIBRARY_URL . '/fancybox/dist/jquery.fancybox.min.js', array( 'jquery' ), false, true );
	// wp_enqueue_script( 'slickslider', Akashanepal_LIBRARY_URL . '/slick/slick.min.js', array( 'jquery' ), false, true );

	// load
	// wp_enqueue_style( 'akashanepal-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script( 'mainjs', Akashanepal_JS_URL . '/scripts.js', array( 'jquery' ), false, true );
	wp_enqueue_style( 'mainstyle', Akashanepal_CSS_URL . '/style.css' );
	
}
add_action( 'wp_enqueue_scripts', 'akashanepal_scripts' );

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

// custom Post type
add_action( 'init', 'tw_custom_posttype' );

function tw_custom_posttype() {
	// testimonials custom post type
	$mt_testimonial_labels = array(
		'name'               => __( 'Testimonials', ''),
		'singular_name'      => __( 'Testimonial', ''),
		'add_new'            => __( 'Add New', ''),
		'add_new_item'       => __( 'Add New Testimonial', '' ),
		'edit_item'          => __( 'Edit Testimonial', '' ),
		'new_item'           => __( 'New Testimonial', '' ),
		'all_items'          => __( 'All Testimonials', '' ),
		'view_item'          => __( 'View Testimonial', '' ),
		'search_items'       => __( 'Search Testimonials', '' ),
		'not_found'          => __( 'No Menu found', '' ),
		'not_found_in_trash' => __( 'No Menu found in the Trash', '' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);

	$mt_testimonials = array(
		'labels'        => $mt_testimonial_labels,
		'description'   => 'Testimonial section',
		'public'        => true,
		'menu_position' => 5,
		'hierarchical'  => false,
		'show_in_rest' => true,
		'supports'      => array( 'title', 'editor', 'thumbnail','excerpt', 'page-attributes' ),
		'has_archive'   => false,
		'menu_icon'		=> 'dashicons-testimonial',
		// 'taxonomies' 	=> array('post_tag'),
		'show_tagcloud' => true,
	);
	register_post_type( 'testimonial', $mt_testimonials );
}
