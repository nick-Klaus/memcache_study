<?php
/**
* Created by PhpStorm.
* User: Administrator
* Date: 2017/12/13
* Time: 21:15
*/
include "./memcache.class.php";

$mem = new Mem();
$mem->addServer('127.0.0.1', 11211);
// print_r ();
// $mem->s("key","好难得哦",false,18000); // 添加一个key
// $mem->s("key",NULL); // 删除一个key
// $mem->s("key"); // 获取一个key
// $mem->increment("key",2); // key值加法
echo  $mem->decrement("key",2); // key值加法
