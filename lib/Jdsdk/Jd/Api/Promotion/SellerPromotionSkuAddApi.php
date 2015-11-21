<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionSkuAddApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 促销编号
     */
    public $promoId;

    /**
     * @var number[]
     * @must true
     * @desc SKU编号
     */
    public $skuIds;

    /**
     * @var string[]
     * @must true
     * @desc 京东价，以元为单位，最高可精确到小数点后两位
     */
    public $jdPrices;

    /**
     * @var string[]
     * @must false
     * @desc 促销价，以元为单位，精确到小数点后一位，且必须小于京东价。
     */
    public $promoPrices;

    /**
     * @var number[]
     * @must false
     * @example 1,2,3,4 或3,1,2,4
     * @desc 套装商品展示次序，相同商品的SKU上次序必须一致，次序必须是1到7之间的自然数。（只对套装促销有效）
     */
    public $seq;

    /**
     * @var number[]
     * @must false
     * @desc 赠品赠送数量，只能送1-3个。(只对赠品促销有效)
     */
    public $num;

    /**
     * @var number[]
     * @must false
     * @desc 绑定类型, 可选值：主商品（1），赠品（2）。(赠品促销、满减送促销中的赠品需要设置为2，其余均设置为1)
     */
    public $bindType;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.sku.add';

    /**
     * @var array
     */
    protected $params = array();


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
        $this->params['promo_id'] = $this->promoId;
        $this->params['sku_ids'] = $this->skuIds;
        $this->params['jd_prices'] = $this->jdPrices;
        $this->params['promo_prices'] = $this->promoPrices;
        $this->params['seq'] = $this->seq;
        $this->params['num'] = $this->num;
        $this->params['bind_type'] = $this->bindType;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.sku.add&id=188');
    }
}

