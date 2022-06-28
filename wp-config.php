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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_1projektas' );

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
define( 'AUTH_KEY',         'G>QL~]5~E=7+gmyG<#S1D|g]inzp@T.C&VhfY,v`p6pNQw~wIC/C[= dE@&lh@Ex' );
define( 'SECURE_AUTH_KEY',  'N2U*w/oNXck$.p/aCz@$$cTM;UqD}|ln^.SsL2;yBZ0dOt}Fz@Ut}S%Ne#uCPqPO' );
define( 'LOGGED_IN_KEY',    '7~}.{1E+[Ym!i[|=p]kof:HDm~GXOoERwcCC-( eN6iI8dEW:uw)q*wfXM+HU_|k' );
define( 'NONCE_KEY',        '`$`XLQ}BgjV8bRG%:1<[%u=It;gQTt/;W+h0`?6]&5XTgYe/?}84!t]?z~ODV!8[' );
define( 'AUTH_SALT',        'UeIaTU>0tK*~JL8fYrOFy`3:uu--URmo3|aZVKNH^cZ1#6f#JZCxCX-uz+Grfdx_' );
define( 'SECURE_AUTH_SALT', '^C`QZ7u(_nlhldxsq~!XccMCNe` #^ ?A%N:oE=^k)t&?Dqz1) LPU*NuJ- ykqC' );
define( 'LOGGED_IN_SALT',   'SP 4X2CGeDL#84*pr*ucw6nzHj{h-cUNk-b11)*9B<Bn6=Hl?bPX?YcF.S6?so:d' );
define( 'NONCE_SALT',       'c4^D9^Z,nmT|mVEVR*ml].NUx<|!V8w?o4kHdi5n4Ytl0<$tCgANPPMXPwegIViS' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
 
define( 'WP_DEBUG', true ); //SHOWS ERRORS

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
