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
define( 'DB_NAME', 'demo' );

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
define( 'AUTH_KEY',         'nlhwyNG*JSC3]gRi]#@Pr5orlNZ<_DiIoce},Q:@-w(@jkqm*&FNl6W8g-:)f#wq' );
define( 'SECURE_AUTH_KEY',  ']rng8;1<choLVb5}n4zJ+_un-i~4(/Qt*VLo;!bDl46`Nl8P;]E-tn|C(l)O*;Y+' );
define( 'LOGGED_IN_KEY',    '^Vt IPp}ayf%Z7zyXsE_,_tO{eB@-Yhf*vh=U6UQ>IMR!JgN<N5!f7CW(O=@oXf4' );
define( 'NONCE_KEY',        'Z$u5d`L6JQ|SFWBC+iGi=q4:&%)|ksqS|!-Azb.I4U#U]B.BYE?SQJh.qNt.cqt[' );
define( 'AUTH_SALT',        'I[N=&!Dl7)|ywvJH@E<y{%?~N)-|b5y9,xr3V/b&VCv-:$[Sr,b#qNc>VP-/h4Kv' );
define( 'SECURE_AUTH_SALT', ')TO-rW:q)?.iMmaOwQj:C8jX|8eb:#{g#QpZ1dI)PnV_Dg]9ymN+46vLn-n8|_d=' );
define( 'LOGGED_IN_SALT',   '1>O8%N$9d7+dgA{T9/T@y)T^Y8iybXcRWS+99#BSQq<!#)58J/8h#BB=*.!@=f}O' );
define( 'NONCE_SALT',       '.rL($|~1Y9qE.i3p&r)B@:6&ocN -c-f(,_{)~nOK`v3S}!X/mbE) Nl>,Qtf;Ob' );

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
