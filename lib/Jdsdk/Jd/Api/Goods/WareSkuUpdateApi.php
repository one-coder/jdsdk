<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareSkuUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     */
    public $skuId;

    /**
     * @var string
     * @must true
     */
    public $wareId;

    /**
     * @var string
     * @must false
     */
    public $outerId;

    /**
     * @var float
     * @must true
     */
    public $jdPrice;

    /**
     * @var int
     * @must true
     */
    public $stockNum;

    /**
     * @var string
     * @must false
     */
    public $tradeNo;

    /**
     * @var string
     */
    public $method = '360buy.ware.sku.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareSkuUpdateApi constructor.
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
        $this->params['sku_id'] = $this->skuId;
        $this->params['ware_id'] = $this->wareId;
        $this->params['outer_id'] = $this->outerId;
        $this->params['jd_price'] = $this->jdPrice;
        $this->params['stock_num'] = $this->stockNum;
        $this->params['trade_no'] = $this->tradeNo;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.sku.update&id=114');
    }
}

