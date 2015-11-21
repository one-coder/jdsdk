<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareSkuAddApi implements IApi{

    /**
     * @var string
     * @must true
     */
    public $wareId;

    /**
     * @var string
     * @must true
     * @example 100041:150041^1000046:15844
     * @desc Sku属性
     */
    public $attributes;

    /**
     * @var float
     * @must true
     * @desc 京东价格
     */
    public $jdPrice;

    /**
     * @var int
     * @must true
     * @desc 库存
     */
    public $stockNum;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     * @must false
     * @desc sku外部id
     */
    public $outerId;

    /**
     * @var string
     */
    public $method = '360buy.ware.sku.add';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareSkuAddApi constructor.
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
        $this->params['attributes'] = $this->attributes;
        $this->params['jd_price'] = $this->jdPrice;
        $this->params['stock_num'] = $this->stockNum;
        $this->params['trade_no'] = $this->tradeNo;
        $this->params['outer_id'] = $this->outerId;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.sku.add&id=123');
    }
}

