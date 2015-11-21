<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;
use Jd\JFunc;

class VenderReturnAddressQueryApi implements IApi{

    /**
     * @var int
     * @must true
     * @desc 退货地址类型.可选值：备件库退货地址(0),自主售后退货地址(1),全部类型(2)
     */
    public $addressType = 2;

    /**
     * @var string
     */
    public $method = 'jingdong.vender.returnaddress.query';


    protected $params = array();


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
        $this->params['address_type'] = $this->addressType;

        JFunc::allDataType2String($this->params);

        // ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.vender.returnaddress.query&id=587');
    }
}

