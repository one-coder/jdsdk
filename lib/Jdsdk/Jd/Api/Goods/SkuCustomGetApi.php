<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class SkuCustomGetApi implements IApi{

    /**
     * @var string
     * @must true
     * @example 21asf234
     * @desc sku的外部商家ID 对应商家后台“商家SKU”字段
     */
    public $outerId;

    /**
     * @var string
     * @must true
     * @example sku_id,ware_id, status,attributes
     * @desc 需返回的字段列表。可选值：Sku结构体中的所有字段；字段之间用","分隔
     */
    public $fields;


    /**
     * @var string
     */
    public $method = '360buy.sku.custom.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SkuCustomGetApi constructor.
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
        $this->params['outer_id'] = $this->outerId;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sku.custom.get&id=93');
    }
}

