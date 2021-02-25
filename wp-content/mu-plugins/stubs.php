<?php
/**
 * Plugin Name: WordPress.org Stubs
 * Description: This plugin contains any stubs for other WordPress.org systems required to make the Theme Directory work.
 */

/**
 * Initial setup of the site, enable the plugins as wp-env doesn't do it.
 */
add_action( 'admin_init', function() {
	global $wpdb;
	if ( get_site_option( 'initial_setup' ) < 1 ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';

		activate_plugins( [
			'jetpack/jetpack.php',
			'theme-check/theme-check.php',
			'theme-directory/theme-directory.php'
		] );

		update_option( 'posts_per_page', 12 );

		// Initial pages are created by wporg_themes_activate().

		update_site_option( 'initial_setup', 1 );
	}

} );