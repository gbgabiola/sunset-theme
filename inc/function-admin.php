<?php

/*
@package sunset-theme
	==========================================
	 ADMIN PAGE
	==========================================
*/
function sunset_add_admin_page() {
  // Generate Sunset Admin Page
  add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'gbgabiola_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110);

  // Generate Sunset Admin Sub Pages
  add_submenu_page('gbgabiola_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'gbgabiola_sunset', 'sunset_theme_create_page');
  add_submenu_page('gbgabiola_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'gbgabiola_sunset_css', 'sunset_theme_settings_page');

  // Activate custom settings
  add_action('admin_init', 'sunset_custom_settings');
}
add_action('admin_menu', 'sunset_add_admin_page');


function sunset_custom_settings() {
  register_setting('sunset-settings-group', 'first_name');
  register_setting('sunset-settings-group', 'last_name');
  register_setting('sunset-settings-group', 'user_description');
  register_setting('sunset-settings-group', 'twitter_handler',
'sunset_sanitize_twitter_handler');
  register_setting('sunset-settings-group', 'facebook_handler');
  register_setting('sunset-settings-group', 'instagram_handler');

  add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'gbgabiola_sunset');
  add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'gbgabiola_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-description', 'Description', 'sunset_sidebar_description', 'gbgabiola_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-twitter', 'Twitter handler', 'sunset_sidebar_twitter', 'gbgabiola_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-facebook', 'Facebook handler', 'sunset_sidebar_facebook', 'gbgabiola_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-instagram', 'Instagram handler', 'sunset_sidebar_instagram', 'gbgabiola_sunset', 'sunset-sidebar-options');
}

function sunset_sidebar_options() {
  echo 'Customize your Sidebar Information';
}

function sunset_sidebar_name() {
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" /> <input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
}

function sunset_sidebar_description() {
  $description = esc_attr(get_option('user_description'));
  echo '<input type="text" name="user_description" value="' . $description . '" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function sunset_sidebar_twitter() {
  $twitter = esc_attr(get_option('twitter_handler'));
  echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}

function sunset_sidebar_facebook() {
  $facebook = esc_attr(get_option('facebook_handler'));
  echo '<input type="text" name="facebook_handler" value="' . $facebook . '" placeholder="Facebook handler" />';
}

function sunset_sidebar_instagram() {
  $instagram = esc_attr(get_option('instagram_handler'));
  echo '<input type="text" name="instagram_handler" value="' . $instagram . '" placeholder="Instagram handler" />';
}

// Sanitization settings
function sunset_sanitize_twitter_handler($input) {
  $output = sanitize_text_field($input);
  $output = str_replace('@', '', $output);
  return $output;
}

function sunset_theme_create_page() {
  // generation of admin page
  require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_settings_page() {
  // generation of admin sub page
  echo '<h1>Sunset Custom CSS</h1>';
}
