<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;
use Jd\JFunc;

class SellercatUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 类目ID
     */
    public $cid;

    /**
     * @var string
     * @must false
     * @desc 店铺类目名称
     */
    public $name;

    /**
     * @var boolean
     * @must false
     * @desc 是否在首页展开分类
     */
    public $homeShow;

    /**
     * @var string
     */
    public $method = '360buy.sellercat.update';


    protected $params = array();


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
        $this->params['cid'] = $this->cid;
        $this->params['name'] = $this->name;
        $this->params['home_show'] = $this->homeShow;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sellercat.update&id=490');
    }
}

