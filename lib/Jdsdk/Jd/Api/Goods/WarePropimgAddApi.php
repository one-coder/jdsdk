<?php
namespace Jd\Api\Goods;

use Jd\Api\JdApiFilter;
use Jd\Api\IApi;
use Jd\JFunc;

class WarePropimgAddApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 商品的id
     */
    public $wareId;

    /**
     * @var string
     * @must true
     * @desc 属性值Id(颜色值Id)（如果没有此ID，请输入0000000000）
     */
    public $attributeValueId;

    /**
     * @var boolean
     * @must false
     * @desc 是否把当前图片设置为主图。若当前sku无主图，则此项必填true。
     */
    public $isMainPic;

    /**
     * @var byte[]
     * @must true
     * @desc 图片数据（注意：签名时不需要添加此参数，image参数通过post 输出流方式发送）图片类型只支持：png和jpg格式，图片须800x800；不能大于1M
     */
    public $image;

    /**
     * @var string
     */
    public $method = '360buy.ware.propimg.add';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WarePropimgAddApi constructor.
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
        $this->params['image'] = $this->image;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.propimg.add&id=113');
    }
}

