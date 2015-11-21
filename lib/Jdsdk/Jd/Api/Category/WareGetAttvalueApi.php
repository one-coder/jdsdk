<?php
namespace Jd\Api\Category;

use Jd\Api\IApi;
use Jd\JFunc;

class WareGetAttvalueApi implements IApi{

    /**
     * @var string
     * @must true
     * @example 格式例如(aid)或(aid;aid)或(aid:vid)或(aid:vid;aid:vid)或(aid;aid:vid)
     * @desc 属性和属性值 id串
     */
    public $avs;

    /**
     * @var string
     * @must true
     * @example aid,vid,name,status,index_id
     * @desc 需返回的字段列表
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.get.attvalue';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareGetAttvalueApi constructor.
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
        $this->params['avs'] = $this->avs;
        $this->params['fields'] = $this->fields;

        // change all data type to string
        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.get.attvalue&id=561');
    }
}

