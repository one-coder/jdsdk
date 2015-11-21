<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;

class VenderShopQueryApi implements IApi{

    /**
     * @var string
     */
    public $method = 'jingdong.vender.shop.query';


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
        $this->params = new \stdClass();
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.vender.shop.query&id=494');
    }
}

