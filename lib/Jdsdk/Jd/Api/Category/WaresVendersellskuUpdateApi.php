<?php
namespace Jd\Api\Category;

use Jd\Api\IApi;
use Jd\JFunc;

class WaresVendersellskuUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 商家属性值id
     */
    public $valueId;

    /**
     * @var string
     * @must true
     * @desc 类目编号
     */
    public $categoryId;

    /**
     * @var int
     * @must true
     * @format /^\d{1,3}$/
     * @desc 排序编号,最多3位，不能为负数
     */
    public $indexId;

    /**
     * @var string
     * @must true
     * @desc 销售属性id
     */
    public $attributeId;

    /**
     * @var string
     * @must true
     * @desc 销售属性值
     */
    public $attributeValue;

    /**
     * @var string
     * @must true
     * @desc 属性值特征(如果属性是颜色，必须传入例如:class:#FFFFFF)
     */
    public $features;

    /**
     * @var int
     * @must true
     * @desc 属性值状态(-1，删除：0：停用，1：显示，2：隐藏)
     */
    public $status;

    /**
     * @var string
     */
    public $method = '360buy.wares.vendersellsku.add';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WaresVendersellskuUpdateApi constructor.
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
        $this->params['value_id'] = $this->valueId;
        $this->params['category_id'] = $this->categoryId;
        $this->params['index_id'] = $this->indexId;
        $this->params['attribute_id'] = $this->attributeId;
        $this->params['attribute_value'] = $this->attributeValue;
        $this->params['features'] = $this->features;
        $this->params['status'] = $this->status;

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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.wares.vendersellsku.add&id=571');
    }
}

