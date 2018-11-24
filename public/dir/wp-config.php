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
define('DB_NAME', 'cruphi_wp121');

/** MySQL database username */
define('DB_USER', 'cruphi_wp121');

/** MySQL database password */
define('DB_PASSWORD', '!S16Ip9[ls');

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
define('AUTH_KEY',         '3olewtlp8pah51pzbeati6hwqhgqscflin8kpcfpizob8plnpifsgym3tolrujoj');
define('SECURE_AUTH_KEY',  'cvsn09dmkdo9mnmcyh0ctanqgvyw3cknrtow4lmemntuoyi3gmhufzr7wu03tjbe');
define('LOGGED_IN_KEY',    'jhoavx5bg6dewgaefr6qdvmihx7kzmhbxhgqrbdl1dy3qhhfdvhhldfkoq7ic8bg');
define('NONCE_KEY',        'pfrkyi10y2npwsdv4479mzqlt4ikkwdj9bay4pf0azwmbsvwla1nk01hiwzietqu');
define('AUTH_SALT',        'iu9bsxu5pgpusebo17l7s8dj7r7rn3ptxqn1b7rwakyjwhkglgyegeppwikunkyg');
define('SECURE_AUTH_SALT', 'rhzplphraql7an2et8ledu95ekihrutfzdctllbbm6uyifxk7ehzdjcgqjophbgx');
define('LOGGED_IN_SALT',   'lmlo8eprll6udzkwqk5ig7xfvqwdtxfynmk2xkr9iylodgq7y4yvdqxs00a8dnib');
define('NONCE_SALT',       'lscekuqabmtojjumsbrxnyj8etbibebzxwvb7fijugizbwg00zdgbolraon9wzao');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpej_';

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
