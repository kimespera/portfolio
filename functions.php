<?php
/**
 * portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolio
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
function portfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on portfolio, use a find and replace
		* to change 'portfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'portfolio' ),
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
			'portfolio_custom_background_args',
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
add_action( 'after_setup_theme', 'portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/all.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-nav', get_template_directory_uri() . '/css/slicknav.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/css/glightbox.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/css/aos.css', array(), _S_VERSION );
	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'portfolio-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'particles', get_template_directory_uri() . '/js/particles.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-nav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/js/glightbox.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

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

// Add custom styles to TinyMCE (including ACF WYSIWYG)
function custom_style_formats( $init_array ) {
	$style_formats = array(
		array(
			'title'    => 'Solid Button',
			'selector' => 'a',
			'classes'  => 'button btn-solid'
		),
		array(
			'title'    => 'Outline Button',
			'selector' => 'a',
			'classes'  => 'button btn-outline'
		),
	);

	// Add custom styles and remove H1 from block format
	$init_array['style_formats'] = wp_json_encode( $style_formats );
	$init_array['block_formats'] = 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre';

	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'custom_style_formats' );

// Ensure 'styleselect' (Formats dropdown) shows up
function add_mce_buttons( $buttons ) {
	if ( ! in_array( 'styleselect', $buttons ) ) {
		array_unshift( $buttons, 'styleselect' );
	}
	return $buttons;
}
add_filter( 'mce_buttons', 'add_mce_buttons' );

// Load Font Awesome in admin for icon visibility
function enqueue_fontawesome_in_admin() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_fontawesome_in_admin' );

// Create custom post types
function create_custom_post_type() {

	// Projects
	$labels_projects = array(
		'name'                  => __('Projects', 'portfolio'),
		'singular_name'         => __('Project', 'portfolio'),
		'menu_name'             => __('Projects', 'portfolio'),
		'name_admin_bar'        => __('Project', 'portfolio'),
		'add_new'               => __('Add New', 'portfolio'),
		'add_new_item'          => __('Add New Project', 'portfolio'),
		'new_item'              => __('New Project', 'portfolio'),
		'edit_item'             => __('Edit Project', 'portfolio'),
		'view_item'             => __('View Project', 'portfolio'),
		'all_items'             => __('All Projects', 'portfolio'),
		'search_items'          => __('Search Projects', 'portfolio'),
		'parent_item_colon'     => __('Parent Projects:', 'portfolio'),
		'not_found'             => __('No projects found.', 'portfolio'),
		'not_found_in_trash'    => __('No projects found in Trash.', 'portfolio')
	);

	$args = array(
		'labels'                => $labels_projects,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true, // For Gutenberg + REST API
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'project'),
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'exclude_from_search'   => false,
		'menu_icon'             => 'dashicons-hammer',
	);

	register_post_type('projects', $args);

}

add_action('init', 'create_custom_post_type');

/**
 * TEMPORARY: Migrate all posts from 'service' post type to 'project'
 * Run once after changing register_post_type(), then remove this function
 * *Check ACF for location update
 * *Update permalinks
*/
// function migrate_service_to_project() {
// 	global $wpdb;

// 	// Change post_type from 'service' to 'project'
// 	$wpdb->query("UPDATE {$wpdb->prefix}posts SET post_type = 'projects' WHERE post_type = 'project'");

// 	// Optional: You can disable this action after it runs once
// 	remove_action('init', 'migrate_service_to_project');
// }
// add_action('init', 'migrate_service_to_project');

// Create custom blocks
function register_acf_block_types() {

	// Form
	acf_register_block_type(array(
		'name'              => 'form',
		'title'             => __('Form Block', 'portfolio'),
		'description'       => __('A custom form block.', 'portfolio'),
		'category'          => 'common',
		'icon'              => 'forms',
		'mode'              => 'edit',
		'render_template'   => get_template_directory() . '/template-parts/blocks/form/form.php',
		'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/form/form.css',
		'supports'          => array(
			'align'  => true,
			'anchor' => true,
			'mode'   => false,
			'jsx'    => true,
		),
		'keywords'          => array('title', 'headline', 'header'),
	));
	
	// Content Image
	acf_register_block_type(array(
		'name'              => 'content-image',
		'title'             => __('Content Image Block', 'portfolio'),
		'description'       => __('A Content Image block.', 'portfolio'),
		'category'          => 'common',
		'icon'              => 'id',
		'mode'              => 'edit',
		'render_template'   => get_template_directory() . '/template-parts/blocks/content-image/content-image.php',
		'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/content-image/content-image.css',
		'supports'          => array(
			'align'  => true,
			'anchor' => true,
			'mode'   => false,
			'jsx'    => true,
		),
		'keywords'          => array('title', 'headline', 'header'),
	));

	// Featured Projects
	acf_register_block_type(array(
		'name'              => 'featured-projects',
		'title'             => __('Featured Projects Block', 'portfolio'),
		'description'       => __('A Featured Projects block.', 'portfolio'),
		'category'          => 'common',
		'icon'              => 'hammer',
		'mode'              => 'edit',
		'render_template'   => get_template_directory() . '/template-parts/blocks/featured-projects/featured-projects.php',
		'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/featured-projects/featured-projects.css',
		'supports'          => array(
			'align'  => true,
			'anchor' => true,
			'mode'   => false,
			'jsx'    => true,
		),
		'keywords'          => array('title', 'headline', 'header'),
	));

	// Fullwidth WYSIWYG
	acf_register_block_type(array(
		'name'              => 'fullwidth-wysiwyg',
		'title'             => __('Fullwidth WYSIWYG Block', 'portfolio'),
		'description'       => __('A Fullwidth WYSIWYG block.', 'portfolio'),
		'category'          => 'common',
		'icon'              => 'media-text',
		'mode'              => 'edit',
		'render_template'   => get_template_directory() . '/template-parts/blocks/fullwidth-wysiwyg/fullwidth-wysiwyg.php',
		'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/fullwidth-wysiwyg/fullwidth-wysiwyg.css',
		'supports'          => array(
			'align'  => true,
			'anchor' => true,
			'mode'   => false,
			'jsx'    => true,
		),
		'keywords'          => array('title', 'headline', 'header'),
	));

	// Experience
	acf_register_block_type(array(
		'name'              => 'experience',
		'title'             => __('Experience Block', 'portfolio'),
		'description'       => __('An Experience block.', 'portfolio'),
		'category'          => 'common',
		'icon'              => 'portfolio',
		'mode'              => 'edit',
		'render_template'   => get_template_directory() . '/template-parts/blocks/experience/experience.php',
		'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/experience/experience.css',
		'supports'          => array(
			'align'  => true,
			'anchor' => true,
			'mode'   => false,
			'jsx'    => true,
		),
		'keywords'          => array('title', 'headline', 'header'),
	));

	// Capabilities
	acf_register_block_type(array(
		'name'              => 'capabilities',
		'title'             => __('Capabilities Block', 'portfolio'),
		'description'       => __('A Capabilities block.', 'portfolio'),
		'category'          => 'common',
		'icon'              => 'portfolio',
		'mode'              => 'edit',
		'render_template'   => get_template_directory() . '/template-parts/blocks/capabilities/capabilities.php',
		'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/capabilities/capabilities.css',
		'supports'          => array(
			'align'  => true,
			'anchor' => true,
			'mode'   => false,
			'jsx'    => true,
		),
		'keywords'          => array('title', 'headline', 'header'),
	));
}

if ( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}
