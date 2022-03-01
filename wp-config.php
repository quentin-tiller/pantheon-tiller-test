<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'selQ0tNU0p4aA+VxBdX6GiaWqQxXs1nEQg/5ueCx+1JG8zqQHlxAqDEYG482avJSTtIQ9GR2frZ4eayUFIuboA==');
define('SECURE_AUTH_KEY',  'QKofTug9W1YcmegNY+i5BBS0538b3EU306f0EH2YmhRqbCJcbvc68DNA7lw3ATwiSWc8sIxlf0sc8frkaZzmNg==');
define('LOGGED_IN_KEY',    'F3DnhGPNayQn903cReFHmFLqxCed5TN1MSnYA02kjJTWnQPHEA9W448NavWRIwhRRb2d+LRpEic+/stCgHp6fA==');
define('NONCE_KEY',        'dkCPdYkvkOlvIg0OhunADQHMgt7QyfRrVjEIaPtmREb50qbntkEVDfuBBDzjTdlK705+LxabrBrmINYjsWa0Fw==');
define('AUTH_SALT',        'GXw/plNqs+xPYWvnsEqXfchdNMXXQ9AnuyxIrfEFQDj9Vww7fUGzb7E7XXsVjdld0iWS7MzrwCl+pKKK3nJaFQ==');
define('SECURE_AUTH_SALT', '1cj+qLPZfhpGRpfLGEZgfZ1oylibqiQ8/u/iRL4QY2yUzn4kUiShU9TsMTlPq4cCrMYcpehUjLs7haJQAKeYPw==');
define('LOGGED_IN_SALT',   'V+D1MZfsbiNiUSTPFDgWx8ila20UpuKIfK/tJNTdsYQkqu44l/H0Fw0KjJkR9G3oZLp9QLryB/bJEzr+PvhMeg==');
define('NONCE_SALT',       'aOcL6EuHtRMAhi2/eHp4ll7us2IrFKlMM+OlGwU+J1NDESnTkFQOapEvT6YHLd4MUKiNlrC+Wydz3h+AdecmGQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
