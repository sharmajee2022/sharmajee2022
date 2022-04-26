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
define( 'DB_NAME', 'ecom' );

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
define( 'AUTH_KEY',         'r}NW%_20^_6ybjn43,ITA#}ueh<D=L6:av)lesWpdM>PDnTO.P.dR#ABx/?!&ftS' );
define( 'SECURE_AUTH_KEY',  'O(#k6mMg){Putpkh!EtHO@^y(uf21%e9-4=+/.[4MuIY@BT_evl[Y,5E[L`8%^cW' );
define( 'LOGGED_IN_KEY',    'cpTRqF5ml-~uAh4q`)$%JHK!!jTXpgSgD-=YD_EU0i>3<pwiJ2K*%E6ynCUK R$)' );
define( 'NONCE_KEY',        'rt)Pl_X6,U045n`iNTI9XNT.FYQlkEBd.D:1Oj2g=rbXP,[ea#g7G{Qx~4X:=b$d' );
define( 'AUTH_SALT',        '_ywhd=m-i9`4eQAwes sOwW&(nBc?0&[@_@%uc9/e:vq|bp-8=`N&dxRCzJ#@%i$' );
define( 'SECURE_AUTH_SALT', '8Y )WDtc-b|VnE*tIIXrd@4@Ois$2/Ne8P:GfbW:brrvx[LuX,h2$_iDNQBbfL;(' );
define( 'LOGGED_IN_SALT',   'Uwd 2|u=QgIQ^G3a]AiN6,APWnPGV;vqoP#Dx1Eyh<y-j;F_EV7u&_yk1]ys.b8+' );
define( 'NONCE_SALT',       '+@H8dJ `m1cs/5*LavI|{9m2g|MY9+ZX/mPC#[ @Wthy^ET[,</7zK~>OUAxO;49' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
