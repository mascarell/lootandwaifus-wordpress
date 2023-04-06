<?php

// Include styles
function sefhi_styles()
{
	// get version number from CSS file so we can easily cache and update it
	$theme = wp_get_theme();
	$version = $theme->get( 'Version' );
	
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $version );
	// wp_enqueue_script( 'code', get_template_directory_uri() . '/js/code.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'code', get_template_directory_uri() . '/js/code.js', array(), filemtime( get_template_directory() . '/js/code.js' ), true,
);
}
add_action('wp_enqueue_scripts', 'sefhi_styles');

// Theme support
function crown_setup()
{
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
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Navigation menus
	register_nav_menus(array(
		'main' => __('No game menu'),
		'nikke' => __('Nikke menu'),
		'haze' => __('Haze menu'),
		'footer' => __('Footer menu')
	));

	// Support for featured images
	add_theme_support('post-thumbnails');

	// Support for post formats
	add_theme_support('post-formats');
}
add_action('after_setup_theme', 'crown_setup');

// Custom length for the excerpt
function custom_excerpt_length( $length )
{
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Custom excerpt text
function new_excerpt_more( $more )
{
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function page_tagcat_settings() {
// Add tag metabox to page
// register_taxonomy_for_object_type('post_tag', 'page');
// Add category metabox to page
register_taxonomy_for_object_type('category', 'page');
}
// Add to the admin_init hook of your theme functions.php file
add_action( 'init', 'page_tagcat_settings' );

// Register Custom Post Type -> guides
function guides() {
	$labels = array(
		'name'                  => _x( 'Guides', 'Post Type General Name', 'guide' ),
		'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'guide' ),
		'menu_name'             => __( 'Guides', 'guide' ),
		'name_admin_bar'        => __( 'Guide', 'guide' ),
		'archives'              => __( 'Item Archives', 'guide' ),
		'attributes'            => __( 'Item Attributes', 'guide' ),
		'parent_item_colon'     => __( 'Parent Item:', 'guide' ),
		'all_items'             => __( 'All Items', 'guide' ),
		'add_new_item'          => __( 'Add New Item', 'guide' ),
		'add_new'               => __( 'Add New', 'guide' ),
		'new_item'              => __( 'New Item', 'guide' ),
		'edit_item'             => __( 'Edit Item', 'guide' ),
		'update_item'           => __( 'Update Item', 'guide' ),
		'view_item'             => __( 'View Item', 'guide' ),
		'view_items'            => __( 'View Items', 'guide' ),
		'search_items'          => __( 'Search Item', 'guide' ),
		'not_found'             => __( 'Not found', 'guide' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'guide' ),
		'featured_image'        => __( 'Featured Image', 'guide' ),
		'set_featured_image'    => __( 'Set featured image', 'guide' ),
		'remove_featured_image' => __( 'Remove featured image', 'guide' ),
		'use_featured_image'    => __( 'Use as featured image', 'guide' ),
		'insert_into_item'      => __( 'Insert into item', 'guide' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'guide' ),
		'items_list'            => __( 'Items list', 'guide' ),
		'items_list_navigation' => __( 'Items list navigation', 'guide' ),
		'filter_items_list'     => __( 'Filter items list', 'guide' ),
	);
	$args = array(
		'label'                 => __( 'Guide', 'guide' ),
		'description'           => __( 'Guides for different games', 'guide' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author','comments' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true, // To use Gutenberg editor.
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'guides', $args );

}
add_action( 'init', 'guides', 0 );

// Register Custom Post Type -> events
function events() {
	$labels = array(
		'name'                  => _x( 'events', 'Post Type General Name', 'event' ),
		'singular_name'         => _x( 'event', 'Post Type Singular Name', 'event' ),
		'menu_name'             => __( 'events', 'event' ),
		'name_admin_bar'        => __( 'event', 'event' ),
		'archives'              => __( 'Item Archives', 'event' ),
		'attributes'            => __( 'Item Attributes', 'event' ),
		'parent_item_colon'     => __( 'Parent Item:', 'event' ),
		'all_items'             => __( 'All Items', 'event' ),
		'add_new_item'          => __( 'Add New Item', 'event' ),
		'add_new'               => __( 'Add New', 'event' ),
		'new_item'              => __( 'New Item', 'event' ),
		'edit_item'             => __( 'Edit Item', 'event' ),
		'update_item'           => __( 'Update Item', 'event' ),
		'view_item'             => __( 'View Item', 'event' ),
		'view_items'            => __( 'View Items', 'event' ),
		'search_items'          => __( 'Search Item', 'event' ),
		'not_found'             => __( 'Not found', 'event' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'event' ),
		'featured_image'        => __( 'Featured Image', 'event' ),
		'set_featured_image'    => __( 'Set featured image', 'event' ),
		'remove_featured_image' => __( 'Remove featured image', 'event' ),
		'use_featured_image'    => __( 'Use as featured image', 'event' ),
		'insert_into_item'      => __( 'Insert into item', 'event' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'event' ),
		'items_list'            => __( 'Items list', 'event' ),
		'items_list_navigation' => __( 'Items list navigation', 'event' ),
		'filter_items_list'     => __( 'Filter items list', 'event' ),
	);
	$args = array(
		'label'                 => __( 'event', 'event' ),
		'description'           => __( 'events for different games', 'event' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author','comments' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true, // To use Gutenberg editor.
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-backup',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'events', 0 );

// Register Custom Post Type -> Characters
function characters() {
	$labels = array(
		'name'                  => _x( 'characters', 'Post Type General Name', 'characters' ),
		'singular_name'         => _x( 'characters', 'Post Type Singular Name', 'characters' ),
		'menu_name'             => __( 'characters', 'characters' ),
		'name_admin_bar'        => __( 'characters', 'characters' ),
		'archives'              => __( 'Item Archives', 'characters' ),
		'attributes'            => __( 'Item Attributes', 'characters' ),
		'parent_item_colon'     => __( 'Parent Item:', 'characters' ),
		'all_items'             => __( 'All Items', 'characters' ),
		'add_new_item'          => __( 'Add New Item', 'characters' ),
		'add_new'               => __( 'Add New', 'characters' ),
		'new_item'              => __( 'New Item', 'characters' ),
		'edit_item'             => __( 'Edit Item', 'characters' ),
		'update_item'           => __( 'Update Item', 'characters' ),
		'view_item'             => __( 'View Item', 'characters' ),
		'view_items'            => __( 'View Items', 'characters' ),
		'search_items'          => __( 'Search Item', 'characters' ),
		'not_found'             => __( 'Not found', 'characters' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'characters' ),
		'featured_image'        => __( 'Featured Image', 'characters' ),
		'set_featured_image'    => __( 'Set featured image', 'characters' ),
		'remove_featured_image' => __( 'Remove featured image', 'characters' ),
		'use_featured_image'    => __( 'Use as featured image', 'characters' ),
		'insert_into_item'      => __( 'Insert into item', 'characters' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'characters' ),
		'items_list'            => __( 'Items list', 'characters' ),
		'items_list_navigation' => __( 'Items list navigation', 'characters' ),
		'filter_items_list'     => __( 'Filter items list', 'characters' ),
	);
	$args = array(
		'label'                 => __( 'characters', 'characters' ),
		'description'           => __( 'characters for different games', 'characters' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author','comments' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true, // To use Gutenberg editor.
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'characters', $args );

}
add_action( 'init', 'characters', 0 );

function remove_comment_fields($fields) {
	unset($fields['email']);
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_fields');

?>