<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderVenderRemarkUpdateApi implements IApi {

    /**
     * @var string
     * @must true
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var string
     * @must false
     * @desc 订单备注
     */
    public $remark;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var int
     * @must false
     * @desc 商家备注提示文字颜色值（默认为灰色） 0:灰色 1:红色 2:黄色 3:绿色 4:蓝色 5:紫色
     */
    public $flag = 0;

    /**
     * @var string
     */
    public $method = '360buy.order.vender.remark.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * Empty construct method
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
        $this->params['order_id'] = strval($this->orderId);
        $this->params['remark'] = $this->remark;
        $this->params['trade_no'] = $this->tradeNo;
        $this->params['flag'] = strval($this->flag);

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.vender.remark.update&id=540');
    }
}