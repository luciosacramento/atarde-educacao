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
define( 'DB_NAME', 'wp_educacao_atarde_2025' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '9xk@:NEmL=W3VB{,*fg:e3zTSD$2^7B?0y1*|0@`<zm6!cMA!/a$F)79{6&Wcwd(' );
define( 'SECURE_AUTH_KEY',  '+|(v/<OuyA,rs95A-1pMm((iNn,1?Kb(?0z7Wyr^B-$c$t=^k0uY{Sxnw$xxLjJ{' );
define( 'LOGGED_IN_KEY',    'y?)!yQ)W2++I-Tcu=vKDYQAq^&%_SptyI$RKa]+juH,9v}[@R(QK-sD4z;wo=6b>' );
define( 'NONCE_KEY',        '*GA#7wT_CPH?>,Tn+>v*oC7a3i7IEQ#:VM@)bXzdJC.5y&V95n<nECBRT45a+?i(' );
define( 'AUTH_SALT',        'h9@NEMCp&i<UfUdH%KMA,6FerBvzOz;ITH21mm!Pz oOTKj[xL9,s%Ajx4f+P8Wd' );
define( 'SECURE_AUTH_SALT', 'kXs}<U$6:ag29JXyUqEl=BgE1.lB<U*=p.i&F[aDVJO.:})-}-K2Bva9:wg*vf{)' );
define( 'LOGGED_IN_SALT',   '7v *y+1;n7{S:CeA#LBzU$m9)vs!({63+s}}K3}$AWAhx]1n3>_tpU7X.pI$aQ%+' );
define( 'NONCE_SALT',       'SoLM{TJ]X=~Da~PFZ&Ji+5+5.3097+p{IGghy~[KtYgL|}{qq%_Vp6GFVrnJBO C' );

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
$table_prefix = 'wp_atArd3_';

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
