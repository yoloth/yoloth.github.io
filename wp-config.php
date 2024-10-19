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
define( 'DB_NAME', 'wordpress_U3AC1' );

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
define( 'AUTH_KEY',         'X)GDcl8$,6LEU,SAJ#z=1(@Rzrll(A/s:zV:ZmqgV0iMY,oJ&~p7D{%V W(Bk(=}' );
define( 'SECURE_AUTH_KEY',  '_OnwEsv<HAp8<RSYX-l82rPkLLx!8m<nl$XdNHoy(u<LM~<SCigIu4` 8t!zWEWO' );
define( 'LOGGED_IN_KEY',    'w:O6g(]<xr,A,<Tb&.VgZ/&ptkKVo1)bg`OATa%>;Yf6psXv:D>YaD+`A0%x*-aH' );
define( 'NONCE_KEY',        'RV0i({$k]EV6&#/X%-(=xeJR8z}Lm,oNHbehZs;qF[&^e7xi%OA5 ~-T66gugdnH' );
define( 'AUTH_SALT',        '0zU)kA:Qz.m`&ko;^F55`:!Rb B$05OhnG!dK~(T4Z5s]Szd}ciq6hxVWm:y59_M' );
define( 'SECURE_AUTH_SALT', 'W8squ[Os-Nr!w*SeM|O-_zWh5<ZSc|UJ)cSsU/}?RWsdZNRp)ua2Na$6tWF)+,TS' );
define( 'LOGGED_IN_SALT',   '2oFHzg1,{h<PPH3^epVXJmJG`UEFEQ`bQ|Wk~.J/G]}{Y(CxQUR3@)&ip9h;i?T.' );
define( 'NONCE_SALT',       't5B&p##TY4<$TUlyK*YhBX@@;hUP!]8agBcAwWYIH`s~We[*59`UfI*s].!e|8my' );

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
