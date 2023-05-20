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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4l~9qKzQ>=S08Eh{]OJ1,m&+la+L~tZ9r{B}/6s&wr5k<dUt5b#X8K@k$,_5s(km' );
define( 'SECURE_AUTH_KEY',  'Ef8J: *8&5sv]FQ5)nbZHavbmkqg]T{4%;Y}6Y%UuPeuUSI^==H/`Qz+=7]t]$]C' );
define( 'LOGGED_IN_KEY',    '*i>6HqWliz{Yrt/E]qL9sZ=7!A*q;9$fZ!2>3`TnDW~,fo8*6p)KM:VNvq6/u-fD' );
define( 'NONCE_KEY',        'aV2g-RuzsySXgL0?~{>yb$M{EX[c8zZ(T!{+2)-Y 7,%7vfL==/iC*%aW;6Ez>B2' );
define( 'AUTH_SALT',        'vvQi=9Eo@AQep/u1Z%x1nd/A1R;P`*wz5iDE[Jw_@nq(Lc27HJ,kRQHz@Z9p:Igh' );
define( 'SECURE_AUTH_SALT', 'm=bE Ph){,2<-%;X5JccHK)5`rZO]a)t6>BFLwPiqF+%tjIU-!zl{)C:t8Prg@r[' );
define( 'LOGGED_IN_SALT',   'hUj/J.|i-0;?Wb?<Qeny2WwoRiS#G@GVUvM/h7U_uP,X-^eV/OFfs6iDV 8gm[MO' );
define( 'NONCE_SALT',       'kcmmSa(s [C.VeQ[pd9+!FO)(:MMpX[$cNchpIZT2FyZii7$x`t!*}R]iL(&9.tC' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
