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
define( 'DB_NAME', 'pet' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define("FS_METHOD","direct");
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Okeqye6< R/dL0!lB-2!J r%^V)YoVYUJf>:-vUa&Ht?7G0rpH4$%/`&KXLjNuR|' );
define( 'SECURE_AUTH_KEY',  '3ap_.A0p<9U5~V,}IzSm2`;0AMY{`k(V _,#sF*tAr|ps0A*AIu?!ho*~.[[2c~K' );
define( 'LOGGED_IN_KEY',    'XUtqVI*FKyC*e2tj}7V}s@&}l<@KyJ~_cN5fg6A%/!k^fY%Kt%3wB.4H/j-v0d#?' );
define( 'NONCE_KEY',        '#mYJR6zfxmFIe56w1we1v(?)_#v-rhs;C-ZcN4uJE}(4ZogY2YBiD~0)6Q*IZ0/K' );
define( 'AUTH_SALT',        'R(vL6e.._QB+^H}-VX[#T9+C%M}3eTA;{3[V=.Y;@Ww=#=br[U9:DFx!LdhuAl;F' );
define( 'SECURE_AUTH_SALT', '}E_jK<Ok%%*$7;<wBMaa1W574|VXd]M@it/D Dx9n`Z<sm1m7:PpHW)*s&z{nZ*h' );
define( 'LOGGED_IN_SALT',   'e%0}MNrT>dY]sX>nS)w?$H&A0l]P=n`VPp*Ro#cecLTo-WK;up9|0i49A?^Q:uFd' );
define( 'NONCE_SALT',       '`;am_cNr3bfZayJIDm)`xu8K_RUgN-$H9a{-ZK.Tq#RUs7X+5xe*yFD7!EF)^6fB' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
