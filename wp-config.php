<?php
define('SAVEQUERIES', true); // added by Sraban
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
define( 'DB_NAME', 'id4718110_wp_b1b201974ba26aa5073bf88d7798a779' );

/** MySQL database username */
define( 'DB_USER', 'id4718110_wp_b1b201974ba26aa5073bf88d7798a779' );

/** MySQL database password */
#define( 'DB_PASSWORD', 'ca73661ca3e93c8abacccdc5cf316e628c590643' );
define( 'DB_PASSWORD', '11may1972000webhost' );

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
define( 'AUTH_KEY',         '[^?HBKqCrP;fp!-W_jJ1XpzDx>, L_3*YD!cS4d^.Oc5~j 10o5c NjwJXDvq]!i' );
define( 'SECURE_AUTH_KEY',  '<vAo=krq13 jLV]4#vF|^Zho0CqITX`)a7rr,{D25?we*;BW]tEP0dKKUZ?#x%Js' );
define( 'LOGGED_IN_KEY',    '|2KpdjHvp<hh%dMP8a3a+lbX.u=&%?7sJ[Kuo[$seQIO`dAq[gTT,U3fKx`V/*L1' );
define( 'NONCE_KEY',        '>uJ|,6V2d8hw[;vy6dW)O^`MOW2+Ium4$7R..KoZFxNBGkq>lXL@P-eJWpWhxcQE' );
define( 'AUTH_SALT',        'd9mbr-/Ei TA I(#*@KOb)aD5Nj4=XW9Y;FO~cutFC}0Y=-~>#SficsR}_HFnWa?' );
define( 'SECURE_AUTH_SALT', 'y,@!slLRvGQ]1-(*D!8^SWG01;O%jNj*@Ys]Ed<%.H 5x*lhrToUtN>(BOWrJ9|G' );
define( 'LOGGED_IN_SALT',   'A^}REx|[U*x8dp;0%vt#SD*>wzF#^lhgmk$5jWJ(/W2e9%W:E+H+b}.SCbcF>kn0' );
define( 'NONCE_SALT',       'R)> CT%/P!_tg}/LL;Kaee{IQL-P*`Ytu7:U7@053pb_MlSMV^ojOix8.5YRX@{^' );

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
