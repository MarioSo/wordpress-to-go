<?php
/**
	* The base configurations of the WordPress.
	*
	* INDEX ............ what you are reading right now
	* SALT KEYS ........ secure your cookies
	* CONTEXT .......... dev or production
	* TABLE PREFIX ..... do not use the default one
	* THEME ............ set default theme
	* CHARSET .......... utf-8 it is
	* COLLATE .......... db collate type
	* WPLANG ........... default language
	* MEMORY LIMIT ..... more power ho-ho-horgh!
	* POST REVISION .... one mistake is for free
	*
	*/

/**
	* SALT KEYS
	* Authentication Unique Keys and Salts.
	*
	* Change these to different unique phrases!
	* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
	* You can change these at any point in time to invalidate all existing cookies.
	* This will force all users to have to log in again.
	*
	* @since 2.6.0
	*/

define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**
	* ENVIRONEMNT
	* local development or production
	*/

if (!isset($_SERVER['ENVIRONMENT']) || (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] === 'production')) {

	define('DB_NAME', 'projectname');
	define('DB_USER', 'projectname');
	define('DB_PASSWORD', 'password');
	define('DB_HOST', 'localhost');

	define('WP_DEBUG', false);
	define('WP_LOCAL_DEV', false);

	define('WP_HOME',        'http://' . $_SERVER['SERVER_NAME']);
	define('WP_SITEURL',     'http://' . $_SERVER['SERVER_NAME'] . '/wp');
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
	define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content');

} else if ($_SERVER['ENVIRONMENT'] === 'development') {

/**
	* DEVELOPMENT SETUP
	* One time setup for local development
	* add the following to httpd.conf:
	*
	* SetEnv localDBHost localhost
	* SetEnv localDBUser root
	* SetEnv localDBPass
	* SetEnv localDBPort 3306
	* SetEnv ENVIRONMENT development
	*
	* DATABASE
	* The name of the Database must match the lowercase name of the project root folder
	*/

	define('WP_DEBUG', true);
	define('WP_LOCAL_DEV', true);
	define('FS_METHOD', 'direct'); //allow local updates

	$url = 'http://' . $_SERVER['SERVER_NAME'] . '/' . basename(__DIR__);
	define('WP_HOME', $url);
	define('WP_SITEURL', $url . '/wp');
	define('WP_CONTENT_URL', $url . '/content');
	define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/' . basename(__DIR__).  '/content');

	define('DB_NAME', strtolower(basename(__DIR__)));
	define('DB_USER', $_SERVER['localDBUser']);
	define('DB_PASSWORD', $_SERVER['localDBPass']);
	define('DB_HOST', isset($_SERVER['localDBPort']) ? $_SERVER['localDBHost'] . ':' . $_SERVER['localDBPort'] : $_SERVER['localDBHost']);

}

/** Database table prefix **/
$table_prefix  = 'm_';

/** Set default theme **/
define('WP_DEFAULT_THEME', 'main');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** WordPress language **/
define('WPLANG', 'de_DE');

/** Increase memory limit **/
define('WP_MEMORY_LIMIT', '128M');

/** Store just 1 post revisions **/
define('WP_POST_REVISIONS', 1);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
