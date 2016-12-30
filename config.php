<?php

/**
 * config,user,password
 * 配置登陆用户名，密码
 */
define('USER',"admin");
define('PASSWORD',"123456");

/**
 * 配置储存cookie的表名
 */
define('COOKIE',"cookie");

/**
 * @return mysqli connect
 * mysql 连接配置
 */
function mysql_con(){
    $mysqli=new mysqli('localhost','root','root','cookie','3306');
    if ($mysqli->connect_errno) {
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>DNS_PROBE_FINISHED_NXDOMAIN</title><style>*{padding:0;margin:0}div{width:600px;margin:0 auto;padding-top:130px}body{background:#f7f7f7;font-family:"Microsoft YaHei"}p{font-size:24px;color:#333;padding-bottom:30px;padding-top:30px}span{color:#b0b0b0;font-size:12px}</style></head><body><div><img src="/asset/error.gif"alt=""><p>无法访问此网站</p><span>DNS_PROBE_FINISHED_NXDOMAIN</span></div></body></html>';
        exit();
    }
    return $mysqli;
}
