<?php


 /**
  * 在使用Oauth2请求授权链接之前,请先配置Jdsdk/Data/config.json 文件中 appKey, appSecret, redirectUri
  * 两个配置参数, state为选填
  *
  * 配置方式有两种:
  * 1. 直接手动修改Jdsdk/Data/config.json 文件(不推荐) (注意:严格按照json文件格式配置,请不要使用UTF-8之外的编号,不能包含中文字符,如果有中文字符请转换为Unicode编码)
  * 2. 使用函数配置(推荐)
  *
  *     $config = Jd::get('config');
  *     $config->set('appKey','000000');
  *     $config->set('appSecret','000000');
  *     $config->set('redirectUri', '0000000');
  *     $config->save();
  *
  *     // 除了这些系统配置之外,您可以添加任何您所需要的配置项,然后使用$config->get('name')获取
  *     // 一定不要和系统配置项重复
  *
  *     // 还可以使用 $config->isInit() 来判断配置文件是否初始化
  *     // 如果配置被你弄乱或者丢失,可以从config.json.bak文件中恢复
  */

require_once '../lib/Jdsdk/Jd.php';
// 自动加载
Jd::registerAutoloader();

// 发送oauth2授权请求
Jd::oauth2();