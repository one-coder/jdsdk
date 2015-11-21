<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionSkuListApi implements IApi{

    /**
     * @var number
     * @must false
     * @desc 商品ID(可选)
     */
    public $wareId;

    /**
     * @var number
     * @must false
     * @desc skuId(可选)
     */
    public $skuId;

    /**
     * @var number
     * @must true
     * @desc 促销编号
     */
    public $promoId;

    /**
     * @var int
     * @must false
     * @desc 绑定类型, 可选值：主商品（1），赠品（2）。(赠品促销、满减送促销中的赠品需要设置为2，其余均设置为1)
     */
    public $bindType;

    /**
     * @var int
     * @must true
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     */
    public $pageSize = 10;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.sku.list';


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
        $this->params['ware_id'] = $this->wareId;
        $this->params['sku_id'] = $this->skuId;
        $this->params['promo_id'] = $this->promoId;
        $this->params['bind_type'] = $this->bindType;
        $this->params['page'] = $this->page;
        $this->params['size'] = $this->pageSize;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.sku.list&id=267');
    }
}

