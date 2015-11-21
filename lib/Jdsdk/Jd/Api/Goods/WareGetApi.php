<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareGetApi implements IApi{

    /**
     * @var string
     * @must true
     * @example 1100000015
     * @desc 商品的id
     */
    public $wareId;

    /**
     * @var string
     * @must false
     * @example ware_id,spu_id cid,created
     * @desc 需返回的字段列表。可选值：ware结构体中的所有字段；字段之间用,分隔
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareGetApi constructor.
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
        $this->params['ware_id'] = $this->wareId;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.get&id=108');
    }
}

