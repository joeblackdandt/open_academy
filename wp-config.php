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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'c9' );

/** MySQL database username */
define( 'DB_USER', 'idanisvgalli' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_pg2#Y$e+8yo5F%4;gItq20s=9(#O9H{;_1A]P3N5[eja9HNEj +]K$RkpSi-K;Z');
define('SECURE_AUTH_KEY',  'N(6,w*;8]FWePtRSOwS .aU9B|R8B|#LS:%D{!#ci~: dKO<RAs;L7deiw5!nXz6');
define('LOGGED_IN_KEY',    'x|-3J@wy`<NBFkUW@PsT#G.W b68~(Jw3:ca;mtE#r+j%]A5iIiQ+b2a~^HCqe#9');
define('NONCE_KEY',        'JmG6(4I6d8+ZV<+N|_m*H7wV*U#$x<9xc jnXq)_])v-K@%2L+~r`&=z.3Xyww&|');
define('AUTH_SALT',        'P/I.Cdhau!Wy,%iAS@#G7S_jx6Qg{M-*+{h.TA(n,<]+$Z2Df9-Ji@Xl0I^@^!EQ');
define('SECURE_AUTH_SALT', '3Mra(ca($s/|h2Ak~,{Y_}O-J4y[rEZ[lh_zSKeGV.A!)U8F7bh=|YBihz.>`n}P');
define('LOGGED_IN_SALT',   'OD6~0!NcspV;.;-O-v=Gs`q~xH;}g[pwNzo,q[Q_sjnpRH&i2Wh^+a[b34yPhCjV');
define('NONCE_SALT',       '|QPiWx&cipW=SGIA(h+m?jx;#ch&R_3fqMb@=q.+xdSey7p&]p*lE94pr8$+}@%1');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
