<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerWareSkuStockListApi implements IApi{

    /**
     * @var string
     * @must true
     * @example 1234567890
     * @desc sku编号
     */
    public $skuId;

    /**
     * @var string
     * @must false
     * @example orderBookingNum,appBookingNum
     * @desc 可选参数，为空则不返回。可选值：orderBookingNum(订单预占库存)，appBookingNum(锁定库存)，orderTransferNum(订单转移至生产库存)，noSaleNum(不可销售库存)，transferPlanOutNum(配货计划出库存)，dcId(配送中心编号)；其中FBP商品以上都有，而非FBP商品只有orderBookingNum和appBookingNum
     */
    public $returnFields;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.ware.sku.stock.list';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SellerWareSkuStockListApi constructor.
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
        $this->params['return_fields'] = $this->returnFields;

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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.ware.sku.stock.list&id=806');
    }
}

