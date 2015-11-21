<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderGetApi implements IApi{


    /**
     * @var string
     * @must true
     * @desc 订单id
     */
    public $orderId;

    /**
     * @var string
     * @must false
     * @desc 需返回的字段列表。可选值：orderInfo结构体中的所有字段；字段之间用','分隔
     */
    public $optionalFields;

    /**
     * @var string
     * @must false
     * @desc 多订单状态可以用英文逗号隔开 1）WAIT_SELLER_STOCK_OUT 等待出库 2）SEND_TO_DISTRIBUTION_CENER 发往配送中心（只适用于LBP，SOPL商家） 3）DISTRIBUTION_CENTER_RECEIVED 配送中心已收货（只适用于LBP，SOPL商家） 4）WAIT_GOODS_RECEIVE_CONFIRM 等待确认收货 5）RECEIPTS_CONFIRM 收款确认（服务完成）（只适用于LBP，SOPL商家） 6）WAIT_SELLER_DELIVERY等待发货（只适用于海外购商家） 7）FINISHED_L 完成 8）TRADE_CANCELED 取消 9）LOCKED 已锁定
     */
    public $orderState;

    /**
     * @var string
     */
    public $method = '360buy.order.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * OrderGetApi constructor.
     */
    public function __construct() {}

    /**
     * Get api method name
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get api params
     *
     * @return string
     */
    public function getJsonParams()
    {
        $this->params['order_id'] = $this->orderId;
        $this->params['optional_fields'] = $this->optionalFields;
        $this->params['order_state'] = $this->orderState;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.get&id=403');
    }
}

