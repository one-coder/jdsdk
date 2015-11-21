<?php
namespace Jd\Api\Category;

use Jd\Api\IApi;
use Jd\JFunc;

class PopVenderCenerVenderBrandQueryApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc 品牌名称，支持模糊查找
     */
    public $name;

    /**
     * @var string
     */
    public $method = 'jingdong.pop.vender.cener.venderBrand.query';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * PopVenderCenerVenderBrandQueryApi constructor.
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
     * @return string
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['name'] = $this->name;

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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.pop.vender.cener.venderBrand.query&id=209');
    }
}

