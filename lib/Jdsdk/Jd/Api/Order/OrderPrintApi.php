<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderPrintApi implements IApi {

    /**
     * @var string
     * @must true
     * @desc 订单id
     */
    public $orderId;

    /**
     * @var string
     * @must false
     * @desc 物流公司ID商家希望返回的订单的信息字段,每个字段以逗号分隔
     */
    public $optionalFields;

    /**
     * @var string
     */
    public $method = '360buy.order.print';

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
        $this->params['optional_fields'] = $this->optionalFields;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.print&id=406');
    }
}