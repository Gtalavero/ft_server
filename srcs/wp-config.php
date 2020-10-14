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
define( 'DB_NAME', 'wordpressdb' );

/** MySQL database username */
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ml0978HJB' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'pxZKH.I!:-g3I0(|F8 !S<|ZSzrS_Ay+OLJ%S:!iSrx~/%Ou hbhnD$p^DAi+H_D');
define('SECURE_AUTH_KEY',  '4d${Bux2YV KAyFMvv=_V1cA84Z29:BGYN2#|;,r-!P;>gs~W<Zb^2:V^0&b{T:p');
define('LOGGED_IN_KEY',    'X~VdD[uU:k,l)g}kghvssHVk)/Em%xf++{E%]Q4uS1mE#(^`|RDrd!$V@[kJe`,$');
define('NONCE_KEY',        'EQ;bkYWXD7H,d#|Q# H6(ZL#^aUv^PmA%85M(XYj+jK!2Sd,&zvRB&s|d>uM3_{h');
define('AUTH_SALT',        'OC{)sre: zESj/hx72waI|v+^*rZ^rQ-I}sv@-k yy /+m6CTyJM?2}tzQ-i1>Z@');
define('SECURE_AUTH_SALT', '@gpwU6!/-8csX[2P?0Vm^xlqev+*KoA_4$^u@t|nNzV{96F8@<&N|lh?,V+NED;e');
define('LOGGED_IN_SALT',   '&!.XsCQ4c@xI.HT`Uxue^pVrshfcz8a;&G:b!Vd,1xK,nN=8.z s22o?k@cjK;;Q');
define('NONCE_SALT',       '56LnhYLTux?v4zm?Nr#X<<{]>}+Xc/<tv>LZN|OeDZ`;#r4<=|4oj5C>V$=Us-|l');

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