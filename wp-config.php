<?php
define('WP_CACHE', false);
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
define( 'DB_NAME', 'multijakarta_wp113' );

/** MySQL database username */
define( 'DB_USER', 'multijakarta_wp113' );

/** MySQL database password */
define( 'DB_PASSWORD', 'vS5p0@6.DL' );

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
define( 'AUTH_KEY',         '5nmm47bi9k9b8arbeib81fh0ycti8urhzvhrpcapl8donnhqhbhblyr6shvq4iaj' );
define( 'SECURE_AUTH_KEY',  '5qnybt9ndji1s1gheiiiva2pjvqjdl6llhgeu69p90wyhnl4tmcnbri6rbond8la' );
define( 'LOGGED_IN_KEY',    'zbsoixsaiy3qfnkdzqkshale2udvw6yoylq0tqxadalofnyoeozusnkfpy8ggh7u' );
define( 'NONCE_KEY',        'sgijpzgpbuvu9epjip7mmcd4arrmgcom1eqlrwvkfqkmergnpbe4mpuzf3rg8boi' );
define( 'AUTH_SALT',        'tya64kfmw61vl4uminunmg1s5n9hcvq9efjgleyqtukegokwcqkcmdttla7qjhm5' );
define( 'SECURE_AUTH_SALT', 'taggh56539xcmrcn69213pmoke4odbnk4edyjnlkhk8el2y81ouxzy1krdabgnea' );
define( 'LOGGED_IN_SALT',   '8junsszteqz3gjknx0q02nw9jdbgjrgdgrrzn44caytlkbzmivlpcml7ujekszsh' );
define( 'NONCE_SALT',       'vdahypmjqn8ftt5zp6hi9np7dswxfgtzf4wwbe5wmwgv5lkof4sbwwk3r6x0dksh' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpxm_';

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
