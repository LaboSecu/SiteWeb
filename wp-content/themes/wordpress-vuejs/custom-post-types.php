<?php

// Register Custom Post Type Blog
// Post Type Key: blog
function create_blog_cpt() {

	$labels = array(
		'name' => __( 'Blogs', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Blog', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Blogs', 'textdomain' ),
		'name_admin_bar' => __( 'Blog', 'textdomain' ),
		'archives' => __( 'Blog Archives', 'textdomain' ),
		'attributes' => __( 'Blog Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Blog:', 'textdomain' ),
		'all_items' => __( 'All Blogs', 'textdomain' ),
		'add_new_item' => __( 'Add New Blog', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Blog', 'textdomain' ),
		'edit_item' => __( 'Edit Blog', 'textdomain' ),
		'update_item' => __( 'Update Blog', 'textdomain' ),
		'view_item' => __( 'View Blog', 'textdomain' ),
		'view_items' => __( 'View Blogs', 'textdomain' ),
		'search_items' => __( 'Search Blog', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Blog', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'textdomain' ),
		'items_list' => __( 'Blogs list', 'textdomain' ),
		'items_list_navigation' => __( 'Blogs list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Blogs list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Blog', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-edit',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields', ),
		'taxonomies' => array( 'blog_category' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'blog', $args );

}
add_action( 'init', 'create_blog_cpt', 0 );

// Register Taxonomy Category
// Taxonomy Key: category
function create_category_tax() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categories', 'textdomain' ),
		'all_items'         => __( 'All Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Category', 'textdomain' ),
		'update_item'       => __( 'Update Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Category', 'textdomain' ),
		'new_item_name'     => __( 'New Category Name', 'textdomain' ),
		'menu_name'         => __( 'Categories', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'textdomain' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
	);
	register_taxonomy( 'blog_category', array('blog', ), $args );

}
add_action( 'init', 'create_category_tax' );

// Register Custom Post Type Session
// Post Type Key: session
function create_session_cpt() {

	$labels = array(
		'name' => __( 'Sessions', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Session', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Sessions', 'textdomain' ),
		'name_admin_bar' => __( 'Session', 'textdomain' ),
		'archives' => __( 'Session Archives', 'textdomain' ),
		'attributes' => __( 'Session Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Session:', 'textdomain' ),
		'all_items' => __( 'All Sessions', 'textdomain' ),
		'add_new_item' => __( 'Add New Session', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Session', 'textdomain' ),
		'edit_item' => __( 'Edit Session', 'textdomain' ),
		'update_item' => __( 'Update Session', 'textdomain' ),
		'view_item' => __( 'View Session', 'textdomain' ),
		'view_items' => __( 'View Sessions', 'textdomain' ),
		'search_items' => __( 'Search Session', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Session', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Session', 'textdomain' ),
		'items_list' => __( 'Sessions list', 'textdomain' ),
		'items_list_navigation' => __( 'Sessions list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Sessions list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Session', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array(),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'session', $args );

}
add_action( 'init', 'create_session_cpt', 0 );

// Register Custom Post Type Member
// Post Type Key: member
function create_member_cpt() {

	$labels = array(
		'name' => __( 'Members', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Member', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Members', 'textdomain' ),
		'name_admin_bar' => __( 'Member', 'textdomain' ),
		'archives' => __( 'Member Archives', 'textdomain' ),
		'attributes' => __( 'Member Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Member:', 'textdomain' ),
		'all_items' => __( 'All Members', 'textdomain' ),
		'add_new_item' => __( 'Add New Member', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Member', 'textdomain' ),
		'edit_item' => __( 'Edit Member', 'textdomain' ),
		'update_item' => __( 'Update Member', 'textdomain' ),
		'view_item' => __( 'View Member', 'textdomain' ),
		'view_items' => __( 'View Members', 'textdomain' ),
		'search_items' => __( 'Search Member', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Member', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Member', 'textdomain' ),
		'items_list' => __( 'Members list', 'textdomain' ),
		'items_list_navigation' => __( 'Members list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Members list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Member', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'member', $args );

}
add_action( 'init', 'create_member_cpt', 0 );
