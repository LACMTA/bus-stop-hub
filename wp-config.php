<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'busstophubmetro_build' );

/** Database username */
define( 'DB_USER', 'busstophubmetro_build' );

/** Database password */
define( 'DB_PASSWORD', 'p9M5[li.S9' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'tyjzj9zokkyxb1kmnbov8ckukkdjnv8srym2oo3gsjbwpovvgj59t8q6vnv1ukbn' );
define( 'SECURE_AUTH_KEY',  'mpxnw9r5hwwhxvfiutybaffnxwaai7vofrgt3mz8gqtq4pqufg8qks4l0wc4fee6' );
define( 'LOGGED_IN_KEY',    'eltmhgm7stxbwlcny7lqe2vgkaifxu5dvcedzu0y35wqhkc7zexkyxjddyh8x4ft' );
define( 'NONCE_KEY',        'icijmupd7axretqfvwvbzmzr2m1ws5fkx1d2fv5s5zl0bxsjd92tux1ciy3taoyy' );
define( 'AUTH_SALT',        'nknr02g6ynl2rqrmyblikgdg98lpupil2qkmf4d7umoogqhcmjonsguq2bg7mtrg' );
define( 'SECURE_AUTH_SALT', 'gxzmwzz3hctvtk10cgogbws5gq6gkxxxmnnltmbatvro5hnu9do1za7a8rkgdtty' );
define( 'LOGGED_IN_SALT',   'vtebeuuk9vq54rmb0ifzabxzh54a0elsme5nbujtuceyg75e3yvnry1wlb0njf8x' );
define( 'NONCE_SALT',       'qssa4fd4tolcip0qjg284byt6tuvfg38r0jimqkrjjwhpubenmc2bhusrdsrgtau' );

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
