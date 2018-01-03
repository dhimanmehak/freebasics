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
define('DB_NAME', 'fundstarter');

/** MySQL database username */
define('DB_USER', 'kickstartercl');

/** MySQL database password */
define('DB_PASSWORD', 'k@3ckstarter&%89');

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
define('AUTH_KEY',         's+w%+zkOwuJ270/TrNdsd<H+;7`T`uKm#C#0{>fUPf[%Aa7>(|x#ay.tZ?`}0cpR');
define('SECURE_AUTH_KEY',  '+Jn5b{|A$L]%Fc4~%uCn^3)v=5ho9x1p3IEP;1rxZ&),.2A-+Zwvq{Sn,)BENEh]');
define('LOGGED_IN_KEY',    'e^,%v/jfXnbC3bk5Lg+E~i:eQM4?zCt0R9kA=dC_u9DW!0pfw(Yp(h]Hf3DcuJPx');
define('NONCE_KEY',        'dIjPmWSD-vO_T%/{(R|TQD$J&Y8amsHE f!5iqz`g}6xhQn+4-;~._E.u#/iK`?*');
define('AUTH_SALT',        ';@X.18{^I+CmF6- dGU-$;p!NuB9uf1+IM]|*RivP|iKGaP}roHEO91w+FP+eco#');
define('SECURE_AUTH_SALT', '0cFO-bwJR~~bUjZ:)`~GkN?/Nh]q#.ej)@e-4O-(|2]C5})SfWRea3/b;b;BTd-,');
define('LOGGED_IN_SALT',   'Jg8d$ts.f|Zf.-ieaD*Kz$$Cxhi8n|,q3Sde^}A*ZPUKr4upLu?U47$!o!{ob||P');
define('NONCE_SALT',       'Im&1YHpU&[e<8q v1L71,V_ s{|-q&N0---SdoJyMir&jDYD5YtWRDW`Kzfm:YDU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
