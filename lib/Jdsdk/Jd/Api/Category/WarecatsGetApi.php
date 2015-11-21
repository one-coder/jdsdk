<?php
namespace Jd\Api\Category;

use Jd\Api\IApi;
use Jd\JFunc;

class WarecatsGetApi implements IApi{

    /**
     * @var string
     * @must true
     * @example id,fid,status,lev,name,index_id
     * @desc 需返回的字段列表。未设置参数时，默认返回全部值
     */
    public $fields;

    /**
     * @var string
     * @must true
     */
    public $method = '360buy.warecats.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WarecatsGetApi constructor.
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

        // change all data type to string
        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.warecats.get&id=184');
    }
}

