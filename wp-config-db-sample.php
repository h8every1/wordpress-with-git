<?php
/**
 * Make a copy of this file named wp-config-db.php
 * wp-config-db SHOULD NOT be version controled, add it to gitignore
 * Use this to store database access information so the main
 * wp-config.php file can be modified and version controlled.
 */

/**
 * Debug block, set WP_DEBUG to false to disable this on the live site
 */

define('WP_DEBUG', true);
if (WP_DEBUG) {
  @ini_set('display_errors', true);
  @ini_set('error_reporting', E_ALL | E_STRICT);
  @ini_set('error_log', $_SERVER['DOCUMENT_ROOT'] . '/php_error.log');
  define('WP_DEBUG_LOG', true);
  define('WP_DEBUG_DISPLAY', false);
  define('SCRIPT_DEBUG', true);
}

/**
 * WordPress Database settings
 */
define( 'DB_NAME',     'database_name_here' );
define( 'DB_USER',     'db_username_here'   );
define( 'DB_PASSWORD', 'db_password_here'   );
define( 'DB_HOST',     'localhost'          );