<?php
error_reporting ( E_ALL | E_STRICT ); // 在开启错误报告
ini_set ( 'display_errors', true ); // 关闭警告
date_default_timezone_set ( 'Asia/Shanghai' ); // 配置地区
define ( "CON_PATH", __DIR__ );
define ( "APP_PATH", CON_PATH . '/application' );
$application = new Yaf_Application ( CON_PATH . "/conf/application.ini" );
$application->bootstrap ()->run ();
?>