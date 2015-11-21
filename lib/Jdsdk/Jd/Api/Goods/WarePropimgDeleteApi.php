<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WarePropimgDeleteApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 商品的id
     */
    public $wareId;

    /**
     * @var string
     * @must true
     * @desc 属性值Id(颜色值Id)
     */
    public $attributeValueId;

    /**
     * @var string
     * @must true
     * @desc 图片Id
     */
    public $imageId;

    /**
     * @var string
     */
    public $method = '360buy.ware.propimg.delete';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WarePropimgDeleteApi constructor.
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
        $this->params['ware_id'] = $this->wareId;
        $this->params['attribute_value_id'] = $this->attributeValueId;
        $this->params['image_id'] = $this->imageId;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.propimg.delete&id=122');
    }
}

