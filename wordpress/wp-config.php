<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wp_database');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2JCc=^,hx0AG?.aXKd 7R3yXtCH-}h?x7ai~r[cLUdqB(*yBa$g!e1ps[)9!ezTC');
define('SECURE_AUTH_KEY',  '5+lMoiE+X~d3FUmU~@6<URUO=,`VYq[vLtA!ZTkU3m9vV,>Pq<$B)fDP)(xQ[}1q');
define('LOGGED_IN_KEY',    'kB6 8g7Vs_;Eq{ZGV9<q3^g9oL@qR7)k4bEg&R4,*Ve3Pr^PJD1yP4cPH,&RnG}}');
define('NONCE_KEY',        'pg[^D7ayY5|eat^SMnG <&YHApc*EX?uEm6VTsPe~cP4L2?}]R=zuW<avR6&^iUS');
define('AUTH_SALT',        'm>6 VE`}]`HJE F,r6N2]a06-~.?3Q:$-|| PP}Jp(LF$s|A,LfU-U^.4k(GQ0FA');
define('SECURE_AUTH_SALT', 'zWj:db?^,v!4+i{#H>6k ((XqpNB(2XT*J&D=G}^ML?6f]u}7RD`KLXP4Of(,BP+');
define('LOGGED_IN_SALT',   'i0odSo1^}u4UtjQ3#1$zlgPp-u XSS:a}JaxLaD~~w|w2yrnV+;a}8yFIde t^v,');
define('NONCE_SALT',       'c)Ls7S/PvDH-|%MQ#F6|83AuOOy:v[1s@S)d;P)=*npW&/yP/+AHW<#I=kbKofLI');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
