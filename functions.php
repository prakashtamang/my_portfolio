<?php
/**
 * MyPortfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MyPortfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function my_portfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MyPortfolio, use a find and replace
		* to change 'my_portfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'my_portfolio', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'my_portfolio' ),
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
			'my_portfolio_custom_background_args',
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
add_action( 'after_setup_theme', 'my_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'my_portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'my_portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my_portfolio_scripts() {
	// Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&display=swap', false );

	// Vendor CSS Files
  	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), false, 'all' );
  	wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/vendor/bootstrap-icons/bootstrap-icons.css', array(), false, 'all' );
  	wp_enqueue_style('aos', get_template_directory_uri() . '/vendor/aos/aos.css', array(), false, 'all' );
  	wp_enqueue_style('glightbox', get_template_directory_uri() . '/vendor/glightbox/css/glightbox.min.css', array(), false, 'all' );
  	wp_enqueue_style('swiper', get_template_directory_uri() . '/vendor/swiper/swiper-bundle.min.css', array(), false, 'all' );

	// Main CSS File
	wp_enqueue_style( 'my_portfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'my_portfolio-style', 'rtl', 'replace' );

	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css', array(), false, 'all' );

	// Vendor JS Files
  	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), false, true );
  	wp_enqueue_script( 'aos', get_template_directory_uri() . '/vendor/aos/aos.js', array(), false, true );
  	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/vendor/glightbox/js/glightbox.min.js', array(), false, true );
  	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), false, true );
  	wp_enqueue_script( 'isotope-layout', get_template_directory_uri() . '/vendor/isotope-layout/isotope.pkgd.min.js', array(), false, true );
  	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/vendor/swiper/swiper-bundle.min.js', array(), false, true );
	//  Main JS File
  	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'my_portfolio_scripts' );

/**
 * Registers post type:Portfolio
 */
function myportfolio_register_portfolio() {

	$labels = array(
		'name'               => __( 'Portfolio', 'my_portfolio' ),
		'singular_name'      => __( 'Portfolio', 'my_portfolio' ),
		'add_new'            => _x( 'Add New Portfolio', 'my_portfolio' ),
		'add_new_item'       => __( 'Add New Portfolio', 'my_portfolio' ),
		'edit_item'          => __( 'Edit Portfolio', 'my_portfolio' ),
		'new_item'           => __( 'New Portfolio', 'my_portfolio' ),
		'view_item'          => __( 'View Portfolio', 'my_portfolio' ),
		'search_items'       => __( 'Search Portfolio', 'my_portfolio' ),
		'not_found'          => __( 'No Portfolio found', 'my_portfolio' ),
		'not_found_in_trash' => __( 'No Portfolio found in Trash', 'my_portfolio' ),
		'parent_item_colon'  => __( 'Parent Portfolio:', 'my_portfolio' ),
		'menu_name'          => __( 'Portfolio', 'my_portfolio' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
		),
	);

	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'myportfolio_register_portfolio' );

/**
 * Create a taxonomy: Portfolio Category
 */
function myportfolio_portfolio_category() {

	$labels = array(
		'name'                  => _x( 'Portfolio Categories', 'Taxonomy categories', 'my_portfolio' ),
		'singular_name'         => _x( 'Portfolio Category', 'Taxonomy category', 'my_portfolio' ),
		'search_items'          => __( 'Search Categories', 'my_portfolio' ),
		'popular_items'         => __( 'Popular Categories', 'my_portfolio' ),
		'all_items'             => __( 'All Categories', 'my_portfolio' ),
		'parent_item'           => __( 'Parent Category', 'my_portfolio' ),
		'parent_item_colon'     => __( 'Parent Category', 'my_portfolio' ),
		'edit_item'             => __( 'Edit Category', 'my_portfolio' ),
		'update_item'           => __( 'Update Category', 'my_portfolio' ),
		'add_new_item'          => __( 'Add New Category', 'my_portfolio' ),
		'new_item_name'         => __( 'New Category Name', 'my_portfolio' ),
		'add_or_remove_items'   => __( 'Add or remove Categories', 'my_portfolio' ),
		'choose_from_most_used' => __( 'Choose from most used Categories', 'my_portfolio' ),
		'menu_name'             => __( 'Categories', 'my_portfolio' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'portfolio_cat', array( 'portfolio' ), $args );
}
add_action( 'init', 'myportfolio_portfolio_category' );

/**
 * Custom Walker Menu
 */
require get_template_directory() . '/inc/myportfolio-walker-menu.php';

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

