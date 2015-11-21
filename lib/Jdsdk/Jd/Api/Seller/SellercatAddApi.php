<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;
use Jd\JFunc;

class SellercatAddApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 父类目编号，如果类目为店铺下的一级类目：值等于0，如果类目为子类目，调用获取360buy.sellercats.get父类目编号
     */
    public $parentId;

    /**
     * @var string
     * @must true
     * @desc 卖家自定义类目名称
     */
    public $name;

    /**
     * @var boolean
     * @must false
     * @desc 是否展开子分类（false，不展开；true，展开）
     */
    public $isOpen;

    /**
     * @var boolean
     * @must false
     * @desc 是否在首页展示分类（false，前台不展示，true前台展示）
     */
    public $isHomeShow;

    /**
     * @var string
     */
    public $method = '360buy.sellercat.add';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SellercatAddApi constructor.
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
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['parent_id'] = $this->parentId;
        $this->params['name'] = $this->name;
        $this->params['is_open'] = $this->isOpen;
        $this->params['is_home_show'] = $this->isHomeShow;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sellercat.add&id=489');
    }
}

