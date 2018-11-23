<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'u512326190_daf');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'u512326190_daf');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'By7v79H5oL');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '4CkV)}v&2)t|{O+|y|]k[<TI^PO $67:,IwTo=.G0ut$D+LP?VFKH~}zd#6FMI$Q');
define('SECURE_AUTH_KEY', 'Gwjb|@s?@t:s+E{*^dV9bg7w8RX4Tw`xf}e++oRUF$M[}euP!V.BdgN^)L&K*i|l');
define('LOGGED_IN_KEY', ',%@:d E0^0nb%BO%i08r.Zw+dQ>|O?|#I(;z1{B.FTRt/Ui4QE.)K-l8)RV4G{m6');
define('NONCE_KEY', '23=n{7JG-NzY:,<s _+E++jXS8%_+?;cv%w#+VCq# ER6DGFzaUeR3>58gQXUuC0');
define('AUTH_SALT', 'r]IPh|,C8d{D-Pmg$$E&#T!{5HUV=KM?+Y/f#4q2}9oNB8GZP5nIA07rrG;G-fti');
define('SECURE_AUTH_SALT', 'LvWlt%E]#p[V)M^iGH+L|`vx/;P7sf{1LMa%[1]*iwP?XW9z@9%TWE(=Uhin=F>^');
define('LOGGED_IN_SALT', 'cL#8@3kaFBAO(:+:9201K4Ry_HC+*|V?WWQ:f#.P0!#1uM6yLCh0^uz=B/9FZ0J`');
define('NONCE_SALT', '^QAKT; xE:X/ixJ3T9_NjTsa_`6^cc}N7{orD.Xe:n&i~<#h3;Pov69ry.8H}~g)');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

