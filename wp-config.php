<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('WP_DEBUG', true);
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'V_><juLg=9tU94Z8+ne5J7Mr`Oz|M2Jo,cxY^)FcRcXO|?iOtl?e?DuU(1{+@nvk');
define('SECURE_AUTH_KEY',  'Ul,6HJ+7Ew&-hDo5>-=M31=lIS2vc@+?w@d(t{qTA))S{1.&1M^OTJ.9_@bL5Rl8');
define('LOGGED_IN_KEY',    'T(C^qIGbs}=nqhZ{h3[){k27Lhq`4.mO&+NWe;!;5<TkQ+xfl6eU*h6:|8i|Ve*7');
define('NONCE_KEY',        ';d1/C1l3{V+!~@f@j>[c>Zu|zg^N-P#a[}k*y1-|>q*C|E1e<t^U=/O/)d-lpjdj');
define('AUTH_SALT',        '8kNz]sc6!*MnU9i=q]j_u5|M?#x-K&vXtPH|T#+jwk@[%4SyU2TcgTJ_y+Bs4*XE');
define('SECURE_AUTH_SALT', ',{_!cA39z;J~/!.AKa4GPpT0#-a+ 8/B{IhXaI1;*N_RB,Hq9JZ%^aTTW4:tb.uD');
define('LOGGED_IN_SALT',   '~@eoFHP-=~fNX6<DQ|1rb?7U{?_fKe{yo5Y--|6}Z]b;thT3slm9J7?J./iN0i<Q');
define('NONCE_SALT',       '^L*;dkB`aYUL(]A#e@|J+jphMCJU9@py 6fjXaik<+<90` y|s.<82+m%]~*,7sM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
