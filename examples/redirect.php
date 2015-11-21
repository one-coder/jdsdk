<?php


 /**
  * 处理Oauth2回调
  *
  * 默认将access token等信息保存到配置文件中, 如果需要返回access token对象,请传入参数true
  *
  * 如果处理回调错误, Jd内容则直接处理了异常
  */

require_once 'autoloader.php';

// 处理Oauth2回调
Jd::redirect();