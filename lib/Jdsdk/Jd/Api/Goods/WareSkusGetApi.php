<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareSkusGetApi implements IApi{

    /**
     * @var string
     * @must true
     * @example 1311,12312,1212
     * @desc sku所属商品id，必选。ware_ids个数不能超过10个
     */
    public $wareIds;

    /**
     * @var string
     * @must false
     * @example sku_id,ware_id, status,attributes
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.skus.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareSkusGetApi constructor.
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
        $this->params['ware_ids'] = $this->wareIds;
        $this->params['fields'] = $this->fields;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.skus.get&id=94');
    }
}

