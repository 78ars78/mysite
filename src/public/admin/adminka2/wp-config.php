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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'arsen_new' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 's123123' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         'G}+kOO>F1=C-L*IJ]fjR:RY!k}Ac~6wV2wOZ)Iz=VWw5Dj=O>~Wc4O!eiqF?:SSX' );
define( 'SECURE_AUTH_KEY',  'hL3BMsE=VHep>v.KVNL ~Cp(8)5h>8pOa..GX._bXClq9k<F[F-#2&ayf47QY$Ma' );
define( 'LOGGED_IN_KEY',    '!HTKzq0!%;dbxsrUXm:-|9:#K&p>ROF[Y4tjOZFG~0$!5MK^!OB7uf`O,E%|}(E/' );
define( 'NONCE_KEY',        '_Bnu6>y;pECds?C>r@BpQp](@3h*NhtcJgx-S%Q:xV+mL~M<(;B~@hC_Bq36><MB' );
define( 'AUTH_SALT',        'a+q>5dw3&ph>E#~(F{=)E~y?/%+tmsc>:RBs/(;b89-Z{G3rm([7V!:d7q+^;O=X' );
define( 'SECURE_AUTH_SALT', 'sUwp?S&0+O~o2peplQ FYFiB*L|~8)C&Nz $U8.}{>gCP*LGBRyFAXqA,W;[FiU{' );
define( 'LOGGED_IN_SALT',   '7%VJ??r/$3>*!v*t7(ylzRHNf<A`#}>x[<T-XqrQ5#w=@&SPQ.{`euz;QuRp7Tob' );
define( 'NONCE_SALT',       'gTlv/l?lhuV%VtcKRi((w<]ik2wqlmo+-0h9R0Q@B-aeE6v.3XxTSYj(dDU5(Cy{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
