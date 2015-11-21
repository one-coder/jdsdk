<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderPrintDataGetApi implements IApi {

    /**
     * @var string
     * @must true
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var string
     */
    public $method = '360buy.order.print.data.get';

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
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['order_id'] = $this->orderId;

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.print.data.get&id=407');
    }
}