<?php


 /**
  * 处理Oauth2回调
  *
  * 默认将access token等信息保存到配置文件中, 如果需要返回access token对象,请传入参数true
  * Jd::redirect(true);
  *
  * 如果回调错误, Jd内部则直接处理了异常
  */

require_once '../lib/Jdsdk/Jd.php';
// 自动加载
Jd::registerAutoloader();

// 处理Oauth2回调
Jd::redirect();