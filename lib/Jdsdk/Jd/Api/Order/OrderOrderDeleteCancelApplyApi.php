<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderOrderDeleteCancelApplyApi implements IApi {

    /**
     * @var number
     * @must true
     */
    public $orderId;

    /**
     * @var string
     */
    public $method = 'jingdong.order.orderDelete.cancelApply';

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

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.order.orderDelete.cancelApply&id=546');
    }
}