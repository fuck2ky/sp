<?php
error_reporting(E_ALL ^ E_DEPRECATED);
define("APP_PATH",dirname(__FILE__));
define("DOYO_PATH",APP_PATH."/include");
@date_default_timezone_set('PRC');
$doyoConfig = array(

'db' => array(
'host' => '127.0.0.1',			//数据库地址
'socket' => '/tmp/mysql.sock',
'port' => 3306,					//数据库端口
'database' => 'sanpellegrino',		//数据库名
'login' => 'root',				//数据库帐号
'password' => '',			//数据库密码
'prefix' => 'dy_',				//数据库表前缀
),

'ext' => array(
'version' => '2.2',
'update' => '20120928',
'auto_update' => 1,
'http_path' => 'http://san.local',
'site_title' => '圣培露',
'site_keywords' => '圣培露',
'site_description' => '圣培露',
'view_themes' => 'default',
'site_html' => 0,
'site_html_dir' => 'html',
'site_html_rules' => '[mold]/[file].html',
'site_html_suffix' => '.html',
'cache_auto' => 1,
'cache_time' => 3600,
'filetype' => 'jpg,gif,jpeg,bmp,png,swf,flv,wmv,wma,mp3,mp4,rar,zip,7z,txt,doc,docx,xls,xlsx,m4v',
'filesize' => 104857600,
'imgwater' => 0,
'imgwater_t' => 2,
'imgcaling' => 1,
'img_w' => 0,
'img_h' => 0,
'comment_audit' => 1,
'comment_user' => 0,
),
);
