<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;
use Jd\JFunc;

class SellercatsGetApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc 返回字段列表
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.sellercats.get';


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
        $this->params['fields'] = $this->fields;

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sellercats.get&id=492');
    }
}

