<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareSkuGetApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc sku id
     */
    public $skuId;

    /**
     * @var string
     * @must false
     * @desc 返回字段列表
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.sku.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareSkuGetApi constructor.
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
        $this->params['sku_id'] = $this->skuId;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.sku.get&id=97');
    }
}

