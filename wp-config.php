<?php
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
define('AUTH_KEY',         'B0HrPdoTzFJCWQmPXG+PZqWdqkhpPnDuq0BURCejSJKKJo0dp06PIZX09/J5p35v+ivs8NC0pW+q2aMPMkXhkQ==');
define('SECURE_AUTH_KEY',  '8L1g+byQ/+O5r9G/NqjRDRG7iu82V1+VJvBal2GcNQsfcS5R1UnMJsr0FsGsDCvsr8stK9hVgkrcXQ7mIvxwBg==');
define('LOGGED_IN_KEY',    'uh9ROWX+XYqU0WFTQ0ylG2E/6Fpf3J0iqkrcArXQ4DDIaP++iYy4Ovk1D0kvbvRxbysAFnpFh1vbSMmEdkutGA==');
define('NONCE_KEY',        'PseFNDyghF3KtYBFDR9McmwMOS95EvNR+NpOrV3rDM9t3dXfkZeSEAuaOq6P8O3xEOghkrxlFnWL5xgNPwqTog==');
define('AUTH_SALT',        'AcGuBVrHMfzVN3o1sI+ChVWTDM2fgjljkUFI/Bev/U/0YqMH2/dVRqfgNTXFAOLVRKn0L9DUFe28rUiTO/G4mw==');
define('SECURE_AUTH_SALT', 'tNWy1+Ie0fuq9bXzE2hxa5bva7zbXsp+pFORe8Ceiu2016rChTPSteL0/9YHMA7EoPTrwjk1BAKnPKyTpgBW2g==');
define('LOGGED_IN_SALT',   'jgPzgfdan+rzV1MeCIkrIFQ54/6U3nEcg5Al1l8odua8H8U518qlatJ94OBx+eo2J6J+9ye2OAKbbziXLhDHKg==');
define('NONCE_SALT',       'GWNE7qo7CXavUXxkRm/BVm26EXE2SpxXlnwWERE8Jp9ZgLFUVkSDE00l92prYJ1f9jMOsOIQ/uBMjfhr9DPYOA==');

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
