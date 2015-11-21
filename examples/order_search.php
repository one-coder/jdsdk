<?php

/**
 * 查询订单接口测试
 */


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