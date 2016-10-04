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
define('DB_NAME', 'englishdept');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '~IiUW*r2$s^bUewu@s-JsOufWDi*|Y,:%`,wN+2YWgB8@GL,XP*9!vAgEbB/Y$*_');
define('SECURE_AUTH_KEY',  '^S]% 6D`0*1~nL3UY3%Qe$,!DB8O02+h#{Cb6$.3H@bd}Bl?4r K4Mq=H&^<<UV/');
define('LOGGED_IN_KEY',    't]./_R B(F 6Y(~Tc.@E~Lu7?iM6#e]~S1v.7/u5JJ%u?Dgx*4)5biaXQ{S;1C%L');
define('NONCE_KEY',        'L]!GCXB0-ir-m N1_{N]Mxcx2RX09pk/$=%yh#MSD d1L)&fg[WSqHWH%~Q`p#=1');
define('AUTH_SALT',        'KwURGW.@19)JP53u:T[e;tvT6<+FY~d{QH]sDqK.2!!F6 BYA](T6KrwRxGkX$/W');
define('SECURE_AUTH_SALT', 'eMUYLThU9K&8BSx._a;w998n~#neZ;/c`M.O*1J[Tks.a7JV4|jIG{%U~UE3;E(V');
define('LOGGED_IN_SALT',   '*g{&a)vy_:N0,wXkolDCnT1jGka:vYnmF-!Q}Wi%V4&%IUHok~F%nS s;1WXXO.W');
define('NONCE_SALT',       'NRFVm/dJU*jiG+cH>UGmLsVR1jJ9iN.AoCIh[^UlvJ<>c}oLVza1TMbDG2l/`~O6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
