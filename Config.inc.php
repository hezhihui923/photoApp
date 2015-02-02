<?php

header("Content-type:text/html;charset=utf-8");
ini_set('display_errors', true);
error_reporting(E_ALL);

 
/*
  if(isset($_GET['letvdebug'])){
          error_reporting(E_ALL);
          ini_set('display_errors', true);
  }else{
          error_reporting(0);//禁用所有错误报告
  }
 */

date_default_timezone_set('Asia/Shanghai');
date_default_timezone_set( 'PRC' );
set_include_path('.' .PATH_SEPARATOR .'/web/photoApp/Include/'.PATH_SEPARATOR . get_include_path()); 
//set_include_path( $_SERVER["DOCUMENT_ROOT"] . '/Include/' . PATH_SEPARATOR . get_include_path());  //配置环境路径
//set_include_path( $_SERVER["DOCUMENT_ROOT"] . '/Include/');  //配置环境路径

define('APP_HOST', 'http://api.photoapi.com');
define('HOST_WWW', 'http://www.photoapi.com'); 
define('WEB_HOST', 'photoapi.com');
define('HOST_ADMIN', 'http://www.photoapi.com/admin_my/'); 
define("WEB_PATH", '/web/photoApp/');
define("UPLOAD_PATH", '/upload/images/');
define("EMAIL_SERVER", 'server@lookshop.com');

/**
 * 公共配置文件
 */
class Config {

          const MC_ENABLE = true;
          const MC_KEYS_LIMIT = 500;              #一次memcache连接最多可获取的对象数
          const MC_LIFETIME_SHORT = 10;               #防攻击过期时间
          const SEARCH_EXPIRE_TIME = 900;             #搜索结果缓存时间
          const DB_MAX_INT = 4200000000;          #数据库整数最大值
          const GROUP_CONCAT_SQL = 'SET SESSION group_concat_max_len = 360000';  #group_concat 最大长度

          /**
           * db server param
           */

          public static $db = array(
              'dbw' => array(//主数据库
                  'host' => '127.0.0.1',
                  'port' => '3306',
                  'dbname' => 'photoApp',
                  'username' => 'root',
                  'password' => '123456',
                  'driver_options' => array(
                      PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
                      PDO::ATTR_EMULATE_PREPARES => true
                  )
              ),
              'dbr' => array(//从数据库
                  'host' => array(
                      '127.0.0.1',
                      '127.0.0.1'
                  ),
                  'port' => '3306',
                  'dbname' => 'photoApp',
                  'username' => 'root',
                  'password' => '123456',
                  'driver_options' => array(
                      PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
                      PDO::ATTR_EMULATE_PREPARES => true
                  )
              ),
              
              
          );

          /**
           * mongodb连接配制
           */
          public static $mdb = array(
              'mdbw' => array(
                  'host' => '127.0.0.1',
                  'port' => '27909',
                  'dbname' => 'my',
                  'username' => 'admin',
                  'password' => 'rTCFIaGkbV',
              ),
              'mdbr' => array(
                  'host' => '127.0.0.1',
                  'port' => '27989',
                  'dbname' => 'my',
                  'username' => 'admin',
                  'password' => 'rTCFIaGkbV',
              ),
          );

          /**
           * memcache server param
           */
          public static $mc = array(
              'mcMain' => array(
                  array('host' => '127.0.0.1', 'port' => '11211')
              ),
              'mcMinor' => array(
                  array('host' => '127.0.0.1', 'port' => '11211'),
              )
          );
          
         

}

//调试用
function seeArr($arr) {
          echo '<pre>';
          print_r($arr);
          echo '</pre>';
          exit;
}

//测试运行时间  如：$t1 = gettimeofday(); 这里是测试的代码 $t2 = gettimeofday();  runtime($t1,$t2,'页面:');
function runtime($t1, $t2, $msg = '') {
          $s = ($t2['sec'] - $t1['sec']) * 1000 + ($t2['usec'] - $t1['usec']) / 1000;
          $s = '<p style="color:blue;text-align:center">' . $msg . '运行了 <b style="color:red;">' . $s . '</b> 毫秒</p>';
          echo $s;
}
