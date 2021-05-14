<?php

/*
@package sunset-theme
	==========================================
	 Admin Page
	==========================================
*/
function sunset_add_admin_page() {
  add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'gbgabiola-sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110);
}
add_action('admin_menu', 'sunset_add_admin_page');

function sunset_theme_create_page() {
  // generation of admin page
}
