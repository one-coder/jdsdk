<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderLbpWaybillUpdateApi implements IApi {

    /**
     * @var string
     * @must true
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var string
     * @must true
     * @desc 物流公司ID
     */
    public $logisticsId;

    /**
     * @var string
     * @must false
     * @desc 运单号
     */
    public $waybill;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     */
    public $method = '360buy.order.lbp.waybill.update';

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
        $this->params['order_id'] = $this->orderId;
        $this->params['logistics_id'] = $this->logisticsId;
        $this->params['waybill'] = $this->waybill;
        $this->params['trade_no'] = $this->tradeNo;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.lbp.waybill.update&id=539');
    }
}