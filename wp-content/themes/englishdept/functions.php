<?php

add_action('wp_enqueue_scripts', 'englishdept_scripts');
add_action('init', 'englishdept_nav_menu');
add_action('init', 'englishdept_theme_support');
add_action('init', 'englishdept_sidebars');
add_action('pre_get_posts', 'englishdept_query_mod');

require_once 'shortcodes.php';
require_once 'classes/CommentsWalker.php';

function englishdept_scripts()
{
	wp_enqueue_style('englishdept-app', get_template_directory_uri() . '/css/app.css');
	wp_enqueue_style('englishdept-fontawesone', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_script('englishdept-jquery', get_template_directory_uri() . '/js/jquery.min.js');
	wp_enqueue_script('englishdept-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', ['englishdept-jquery']);
}

function englishdept_nav_menu()
{
	register_nav_menu('englishdept-header-menu', __('Header Menu'));
}

function englishdept_theme_support()
{
	add_theme_support('post-thumbnails');
}

function englishdept_sidebars()
{
	register_sidebar([
		'name' => 'Footer Sidebar',
		'id' => 'englishdept-footer-sidebar',
		'description' => 'Widgets shown in the footer section',
		'before_widget' => '<div class="col-md-3">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		]);

	register_sidebar([
		'name' => 'Aside Sidebar',
		'id' => 'englishdept-aside-sidebar',
		'description' => 'Widgets shown in aside from the main content',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="page-header">',
		'after_title' => '</h4>'
		]);
}

function englishdept_query_mod($query)
{
	if ($query->is_home() && $query->is_main_query())
		$query->set('cat', 3);
	if ($query->is_tax('document-type'))
		$query->set('posts_per_page', 15);
	if ($query->is_search() && $query->is_main_query())
		$query->set('post_type', ['post', 'document']);
}