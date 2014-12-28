<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'celebration_db');

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

define('AUTH_KEY',         '}k+U5T~ml#iG?PipHwipn:.{<i.;vr;c+((%Bu,:m@WpOYx,s B4nbV*fU$P}jIA');
define('SECURE_AUTH_KEY',  '$-|wnNINP=`)|)?/qUkj3wrUm/]= +*6eCMQJvWseU%MTB2%l}^QvY%#<)?89+3,');
define('LOGGED_IN_KEY',    's4zVh,ZbIXTa+tBr-qT{Z=R*gPVv,tYa2LXnRRb48^JtcOK^f5`]Ev9SUt7qN<gB');
define('NONCE_KEY',        'OJ*T9&hG4+BL^kZ4ITbME<_OPU4XB5>aLXJ|RVo<E27sUR!~w2-_z=q@#jNc6jq?');
define('AUTH_SALT',        '^7-]%XfjQWuH<xS2J1.|7Q7K|SL4Wus:^}R;-X$~-LG k_KvING xToyPo1(<ef0');
define('SECURE_AUTH_SALT', 'f`-:7~?x)St0k%%q8Q4~-UuYN3-#EHOe#/4M8M;vzUsdyA+@4i:Pq8N;uG?>W9#[');
define('LOGGED_IN_SALT',   '$-GycppnVP$iz{[EVTOPtnMgP_.czb*YVD@;|pj^Zdk;}aF:-W*eOxLzk!%#,{A4');
define('NONCE_SALT',       'y:yam+NZ*[$4+9[>GKIZv/<*F~v|)@/EIw&zs^[fJwCFY^upK@,A |Uu54p.lPWJ');


$table_prefix = 'wp_';

define('WPLANG', '');

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
