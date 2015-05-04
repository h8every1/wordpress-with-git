<?php
/**
 * Make a copy of this file named wp-config-local.php
 * wp-config-local SHOULD NOT be version controlled.
 * Use this to store database access information and local settings so the main
 * wp-config.php file can be modified and version controlled.
 */

/**
 * Debug block, set WP_DEBUG to false to disable this on the live site
 */

define( 'WP_DEBUG', true );
if ( WP_DEBUG ) {
	@ini_set( 'display_errors', true );
	@ini_set( 'error_reporting', E_ALL | E_STRICT );
	@ini_set( 'error_log', $_SERVER['DOCUMENT_ROOT'] . '/php_error.log' );
	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', true );
	define( 'SCRIPT_DEBUG', true );
} else {
	define( 'WP_DEBUG_DISPLAY', false );
}

/**
 * WordPress Database settings
 */
define( 'DB_NAME', 'database_name_here' );
define( 'DB_USER', 'db_username_here' );
define( 'DB_PASSWORD', 'db_password_here' );
define( 'DB_HOST', 'localhost' );

/**
 * Set default theme
 */
define( 'WP_DEFAULT_THEME', 'theme' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'put your unique phrase here' );
define( 'SECURE_AUTH_KEY', 'put your unique phrase here' );
define( 'LOGGED_IN_KEY', 'put your unique phrase here' );
define( 'NONCE_KEY', 'put your unique phrase here' );
define( 'AUTH_SALT', 'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT', 'put your unique phrase here' );
define( 'NONCE_SALT', 'put your unique phrase here' );

/**#@-*/

/**
 * Define paths for git-controlled WordPress in separate directory
 */

define( 'WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress' );
define( 'WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content' );