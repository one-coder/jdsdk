<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;

class VenderShipaddressQueryApi implements IApi{

    /**
     * @var string
     */
    public $method = 'jingdong.vender.shipaddress.query';


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
     */
    public function getJsonParams()
    {
        $this->params = new \stdClass();
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.vender.shipaddress.query&id=586');
    }
}

