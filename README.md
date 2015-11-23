## 京东PHP版本SDK
个人封装的一个简单PHP店铺接口SDK

前段时间一直在做公司京东店铺的订单和CRM对接工作,阅读文档发现京东官方提供的PHP版本的SDK下载链接失效,网上找到一些,使用了一下发现版本太老,用起来不怎么顺手,于是自己整理了一下,并开源到github上提供给开发者使用.

## 使用声明

* 个人从事PHP开发年限较短,水平有限,如有错误或者有好的改进建议,请给我发邮件,任何Bug提交和优化建议都会连同您的姓名一起写入版本更新日志中
* 时间仓促,部分API并没有进行完整的测试,如果在使用过程有错误,请邮件告知
* 目前封装的API包括以下几块:`类目API`,`店铺API`,`商品API`,`订单API`,`促销API`,`FBP仓储API`,`SOP仓储API`,如有使用其他API,请参考已有API进行封装
* 非常感谢[Requests](https://github.com/rmccue/Requests)项目的提供者,为我得开发提供的很大的便利并解决了我一直困扰的问题
* 项目完全开源,您可以使用于任何途径或者修改任何一句代码,但任希望能够保留作者信息

## 版本信息

当前版本 0.1.1

## 使用方式

详细使用方式,请参照examples中得例子

```php

  require_once 'autoloader.php';

  // 实例化接口对应API
  $api = new \Jd\Api\Order\OrderSearchApi();
  // 参数赋值
  $api->orderState = 'WAIT_SELLER_STOCK_OUT';

  // 如果不知道该api所有参数是否完整,可以使用 Jd::apiVerify($api) 进行验证, 验证结果将通过html表格展示
  //Jd::apiVerify($api);

  // 可以通过 API::openApiDocument() 打开官方的api接口描述页面
  //\Jd\Api\Order\OrderSearchApi::openApiDocument();

  // 可以通过 Jd::isOverdue() 来判断哦oauth2授权是否过期
  //if (!Jd::isOverdue())
  //{
  //    do something...
  //}

  // 请求接口获取数据
  $result = Jd::execute($api);

  if ($result->status)
  {
      // 接口执行成功
      print($result->methodName);  // 接口名称
      print($result->requestUrl);  // 请求完整url
      print($result->code);  // 返回状态码
      print($result->data);  // 接口返回数据

  } else {
      echo $result->errMsg;  //错误说明
  }
```

##有问题反馈
在使用中有任何问题，欢迎反馈给我，可以用以下联系方式跟我交流

* 邮件(one_coder#sina.com, 把#换成@)
* QQ: 986096752
