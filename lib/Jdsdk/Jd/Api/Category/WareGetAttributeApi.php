<?php
namespace Jd\Api\Category;

use Jd\Api\IApi;
use Jd\JFunc;

class WareGetAttributeApi implements IApi
{

    /**
     * @var string
     * @must true
     * @desc 类目id
     */
    public $cid;

    /**
     * @var boolean
     * @must false
     * @desc 是否关键属性(true/false)
     */
    public $isKeyProp;

    /**
     * @var boolean
     * @must false
     * @desc 是否销售属性(true/false)
     */
    public $isSaleProp;

    /**
     * @var string
     * @must false
     * @desc 属性id
     */
    public $aid;

    /**
     * @var string
     * @must true
     * @example aid,name,is_key_prop,is_sale_prop
     * @desc 需返回的字段列表
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.get.attribute';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareGetAttributeApi constructor.
     */
    public function __construct()
    {
    }

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
        $this->params['cid'] = $this->cid;
        $this->params['is_key_prop'] = $this->isKeyProp;
        $this->params['is_sale_prop'] = $this->isSaleProp;
        $this->params['aid'] = $this->aid;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.get.attribute&id=562');
    }
}

