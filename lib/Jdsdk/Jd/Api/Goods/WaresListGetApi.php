<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WaresListGetApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 商品的id，用逗号分隔，最多不能超过10个
     */
    public $wareIds;

    /**
     * @var string
     * @must false
     * @desc 返回字段列表
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.wares.list.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WaresListGetApi constructor.
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.wares.list.get&id=109');
    }
}

