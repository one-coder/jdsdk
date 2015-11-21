<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareTemplateIdsNamesGetApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc 返回字段列表
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.template.ids.names.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareTemplateIdsNamesGetApi constructor.
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.template.ids.names.get&id=103');
    }
}

