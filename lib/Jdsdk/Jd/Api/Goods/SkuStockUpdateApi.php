<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class SkuStockUpdateApi implements IApi{

    /**
     * @var string
     * @must false
     * @example 1100000015
     * @desc sku的id
     */
    public $skuId;

    /**
     * @var string
     * @must false
     * @desc 外部id
     */
    public $outerId;

    /**
     * @var int
     * @must true
     * @desc 需要更新的库存数量
     */
    public $quantity;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     * @must false
     * @desc 分区库存ID。若使用分区库存则为必填项，且为数字；若不使用分区库存则可不填
     */
    public $storeId;

    /**
     * @var string
     */
    public $method = '360buy.sku.stock.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SkuStockUpdateApi constructor.
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
        $this->params['sku_id'] = $this->skuId;
        $this->params['outer_id'] = $this->outerId;
        $this->params['quantity'] = $this->quantity;
        $this->params['trade_no'] = $this->tradeNo;
        $this->params['store_id'] = $this->storeId;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sku.stock.update&id=117');
    }
}

