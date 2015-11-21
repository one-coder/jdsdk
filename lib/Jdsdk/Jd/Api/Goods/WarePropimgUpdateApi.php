<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WarePropimgUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     */
    public $wareId;

    /**
     * @var string
     * @must true
     */
    public $attributeValueId;

    /**
     * @var boolean
     * @must false
     * @desc 是否把当前图片设置为主图
     */
    public $isMainPic;

    /**
     * @var string
     * @must true
     */
    public $imageId;

    /**
     * @var string
     */
    public $method = '360buy.ware.propimg.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WarePropimgUpdateApi constructor.
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
        $this->params['ware_id'] = $this->wareId;
        $this->params['attribute_value_id'] = $this->attributeValueId;
        $this->params['is_main_pic'] = $this->isMainPic;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.propimg.update&id=119');
    }
}

