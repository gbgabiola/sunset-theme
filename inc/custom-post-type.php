<?php

/*
@package sunset-theme
	==========================================
	 THEME CUSTOM POST TYPES
	==========================================
*/

$contact = get_option('activate_contact');
if (@$contact == 1) {
  add_action('init', 'sunset_contact_custom_post_type');
}

/* CONTACT Custom Post Type */
function sunset_contact_custom_post_type() {
  $labels = array(
    'name'            => 'Messages',
    'singular_name'   => 'Message',
    'menu_name'       => 'Messages',
    'name_admin_bar'  => 'Message',
  );
  $args = array(
    'labels'          => $labels,
    'show_ui'         => true,
    'show_in_menu'    => true,
    'capability_type' => 'post',
    'heirarchical'    => false,
    'menu_position'   => 26,
    'menu_icon'       => 'dashicons-email-alt',
    'supports'        => array('title', 'editor', 'author'),
  );

  register_post_type('sunset-contact', $args);
}
