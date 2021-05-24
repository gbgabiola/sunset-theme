<?php

/*
@package sunset-theme
	==========================================
	 ADMIN ENQUEUE FUNCTIONS
	==========================================
*/
function sunset_load_admin_scripts($hook) {
  // echo $hook;
  if ('toplevel_page_gbgabiola_sunset' == $hook) {
    wp_register_style('sunset-admin-style', get_template_directory_uri() . '/css/sunset-admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('sunset-admin-style');

    wp_enqueue_media();

    wp_register_script('sunset-admin-script', get_template_directory_uri() . '/js/sunset-admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('sunset-admin-script');
  } elseif ('sunset_page_gbgabiola_sunset_css' == $hook) {
    wp_enqueue_style('ace', get_template_directory_uri() . '/css/sunset-ace.css', array(), '1.0.0', 'all');

    wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.4.12', true);
    wp_enqueue_script('sunset-custom-css-script', get_template_directory_uri() . '/js/sunset-custom_css.js', array('jquery'), '1.0.0', true);
  } else {
    return;
  }
}
add_action('admin_enqueue_scripts', 'sunset_load_admin_scripts');
