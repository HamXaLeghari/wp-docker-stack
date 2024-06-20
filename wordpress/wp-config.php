<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') );

/** Database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER') );

/** Database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );

/** Database hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':*6rIpPlo/s$G6)l*|*EW_DRUgI,<uyde`g#LWdYns_wfZ0XQtU;V/SpHu]:+dPM' );
define( 'SECURE_AUTH_KEY',  '$I*(_*t @* m&M[f` -Fr,B*_V_;i6cx(xW>.O?=)V22gaBP)`/rW:C`e9Y?`]=w' );
define( 'LOGGED_IN_KEY',    'xR&|f*|t] I07EqHxGmuD+A*4j~u+=FXk;105{,7tALlmtOYW1hhU2@=N7=hs0g2' );
define( 'NONCE_KEY',        '$qX[HW9U:S~$;: /nx{9`|6%2Nlw@5~~j?S!Xv!Q7ALyJew`ju[E3B:Cvu7u3kzn' );
define( 'AUTH_SALT',        'vkeAhPCT>w+|W2R2m5@a$7@yan~m/EW+@HsUgbwjsyJ&LR<hfh8Fy#}su723oQX~' );
define( 'SECURE_AUTH_SALT', '(l~:!.A;>RV}JrZ&sNT&[Ab$p=7WRMIW:PqT%JJpa>j12`}T+aY;w,ZB0as)+/F.' );
define( 'LOGGED_IN_SALT',   '>D^Kxcn|#DUW(-?#W4>Q[&,qSd;2a.sZef&9$9tJm/G({fy9If<BU-B/BDIeU=mF' );
define( 'NONCE_SALT',       'Td@i?N]PZ |@C/_EBK?iP-?oqA|Z0mgAY-,YxDV-7Ohx-s#QwyrIeBz{+9[0`tqp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );



/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD','direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

