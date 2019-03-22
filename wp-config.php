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
define('DB_NAME', 'simpsons');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '6bIzLM.C!wrx@uIpvoQrF^Zx-0U6%-pwREg6Wq9*}s;UOalf@WMmAVhRe`*+:aV~');
define('SECURE_AUTH_KEY',  '3mSqyKSE^Jm|,VP6A<-=Xdf$BD;~ByhR_%u7L}T&.ZPWMJLa6;%QqXEI!T?Cl V#');
define('LOGGED_IN_KEY',    'K$I=j8{T5YX,9U^0zs5D]Z1uZN>r2@$X39c;i1txMmyju8&Q8$#Ow.wr<]==aQqC');
define('NONCE_KEY',        'UIR^y-g{HqLU^,qso+jrc|7B%2Dj&:Z`h*PsK=TbN=JIWNE_EyK>?|P/c#KA}T=d');
define('AUTH_SALT',        'eC<T{YvG-:P]bqUhOR eQNf{pO1mN}}- wgk#A79v0nB.oB-]WahD*Q7zwr*,1Da');
define('SECURE_AUTH_SALT', 'LGg8&MFgxj53-*49vGS*5HZO:cLd_?oALq1nO +[8`EWhBj4OtJ=xcX^=Ttqe-.=');
define('LOGGED_IN_SALT',   'X;QPx^-K6wj^x7K6y_Q6.p-jYz%~Ov/J!1c8Q[Y)?Q/hl]-[$P0$A?QWiqp60hUa');
define('NONCE_SALT',       'V,6(Lb~k7mDs ]%h9HuJ/pH}K jT*-Hci~@j 3WxZz,heGSo=y~dHbR,}0yM!RE ');

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
