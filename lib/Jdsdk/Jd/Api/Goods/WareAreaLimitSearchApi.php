<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareAreaLimitSearchApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 商品id，必选
     */
    public $wareId;

    /**
     * @var int
     * @must true
     * @desc 业务类型 1:限购(目前只支持限购)
     */
    public $type = 1;

    /**
     * @var string
     * @must false
     * @desc 商家希望返回的限购区域的信息字段, 可选值: WareAreaLimit数据结构中的以下字段: order_id,vender_id, area_fid等每个字段以逗号分隔
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.area.limit.search';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareAreaLimitSearchApi constructor.
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
        $this->params['type'] = $this->type;
        $this->params['fields'] = $this->fields;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.area.limit.search&id=126');
    }
}

