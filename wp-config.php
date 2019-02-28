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
define('DB_NAME', 'wp_hospital');

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
define('AUTH_KEY',         ';tMEJObAV5]CN?.Ou<5tHY}guG`mx>sMQ~DR%Q~6OV@XOs|(U7f^sF{uHu@WnQ^U');
define('SECURE_AUTH_KEY',  'tEHgffi8ZSk&_3@egEZ RN+tm_Xm|,7V6_a(=-22`93h3YIg@&L?m7!AL*8r^yv ');
define('LOGGED_IN_KEY',    'n[Ep)7I?d]ck3lE,sHEM&Fd9ZC_wG@Z7=0FC+@2_+i{)/(!Yx|omDz3HLlZUO]eF');
define('NONCE_KEY',        'M^i {m*oa|cNdsLce8#N)*uJ6Tjtnq8T@O&-_r$tQV&9V-RM0L]2k{M[?jlzt7Nu');
define('AUTH_SALT',        '%u,p_A^Ygq*=Auw.J^u5<IQy[4yFzF$v6a()6]#8|fr6,rweBsWeL*zVWZm05]F=');
define('SECURE_AUTH_SALT', '6Wi<x4QoXpT=5AtE?(lT:ki]s&j`rbi63oyqU2b~-62&9@%.}l}#F)jG~wJwyd+W');
define('LOGGED_IN_SALT',   'M0le=P]{}[F7(+I!7 JF;E>b$qG;^,Xs<sMjZDz+Q^D+9aUhxm@T7E6N9B~Fr>ht');
define('NONCE_SALT',       '|4|^iX&l/+Z8Uf=A&{)Z6r28D]$sfP%76V_itnH((Oqkfn+k}pp{U*n;}J11q]];');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
