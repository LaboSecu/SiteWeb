<?php

// Wordpress theme support
add_theme_support('post-formats');
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('widgets');
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);

// Add endpoint to Wordpress API to get menus
function get_menu ($data) {
  $menu = wp_get_nav_menu_items($data['menu']);
  return $menu ? $menu : null;
}
add_action( 'rest_api_init', function () {
  register_rest_route( 'wp/v2', '/menu/(?P<menu>.+)', [
    'methods' => 'GET',
    'callback' => 'get_menu'
  ]);
});

// Add endpoint to Wordpress API to get customfields
function get_customfields ($data) {
  $key = $data['key'] ? $data['key'] : '';
  $customfields = get_post_meta($data['pid'], $key);
  return $customfields ? $customfields : null;
}
add_action( 'rest_api_init', function () {
  register_rest_route( 'wp/v2', '/customfields/(?P<pid>\d+)', [
    'methods' => 'GET',
    'callback' => 'get_customfields'
  ]);
  register_rest_route( 'wp/v2', '/customfields/(?P<pid>\d+)/(?P<key>.*)', [
    'methods' => 'GET',
    'callback' => 'get_customfields'
  ]);
});

// Register Custom Post Types
include_once 'custom-post-types.php';

// Go to the Vue.js app
