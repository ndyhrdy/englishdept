<?php

add_action('init', 'englishdept_shortcodes');

function englishdept_shortcodes()
{
	add_shortcode('englishdept-contact-form', 'englishdept_shortcode_contact_form');
	add_shortcode('englishdept-staff-list', 'englishdept_shortcode_staff_list');
}

function englishdept_shortcode_contact_form()
{
	ob_start();
	require_once 'contact-form.php';
	return ob_get_clean();
}

function englishdept_shortcode_staff_list()
{
	$staff = pods('staff');
	$staff->find(array(
		'orderby' => 't.post_title ASC'
		));
	ob_start();
	require_once 'staff-list.php';
	return ob_get_clean();
}