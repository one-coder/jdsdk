<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OverseasOrderSopOutstorageApi implements IApi{


    /**
     * @var string
     * @must true
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     */
    public $method = '360buy.overseas.order.sop.outstorage';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * OverseasOrderSopOutstorageApi constructor.
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
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['order_id'] = $this->orderId;
        $this->params['trade_no'] = $this->tradeNo;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.overseas.order.sop.outstorage&id=536');
    }
}

