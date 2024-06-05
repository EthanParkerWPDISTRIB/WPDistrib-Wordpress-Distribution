<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wpdistrib1' );

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
define( 'AUTH_KEY',         '|-V#CkFCp.QI8&9]CB5Y3P te/1V.;+E@[:5]+;~TEsl+v%UF,5AXU0l3?9ev}sD' );
define( 'SECURE_AUTH_KEY',  'STnQ_=j8zEAean65kO@@PvJG{pv)7p`{p/A5Hi0ja;W{.`c8.[_+^2I/O_MEEly2' );
define( 'LOGGED_IN_KEY',    '8Jm]7>xBi|7Cu<vf!oY1af5(lqsBMP8-&k+:>[Xl<v(=6z{rp%wE6Jk-rldI:a50' );
define( 'NONCE_KEY',        ';3^^U~N<2H)//5~$_J=I07Bh3*rs}.-40tascfs++MO{~m]C1`i&e6X#Vr{&ZJvj' );
define( 'AUTH_SALT',        '&{#m_]<{iS-7o2{9frC&]O?=|9H~4>*QhrA/q9{$(8N8$M;A7%#K|NU@1ERiUkY@' );
define( 'SECURE_AUTH_SALT', 'WACaiLodCY=0U*yv<0MoBjkE-Ff*V4}mjHQo&GApIy9^o^Lpd|O8SRxq7E&@:pqY' );
define( 'LOGGED_IN_SALT',   'WAsxi~3W$50pXZvIZ}~).18TxhN0KpLyvOLuix@>n&I*6z8+9km{Pb/^41e7 i7R' );
define( 'NONCE_SALT',       ';;TDG?[GmAUlL5cLu7n=]]l$aAL_Y=6.@MYY[lNG44?inL:E+K#gK9BMe=| z#=L' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
