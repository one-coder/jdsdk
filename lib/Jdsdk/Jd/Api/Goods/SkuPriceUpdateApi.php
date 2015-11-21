<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class SkuPriceUpdateApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc sku的id（sku_id与outer_id至少填写一项，两者都填写时，以sku_id为准）
     */
    public $skuId;

    /**
     * @var string
     * @must false
     * @desc 外部id（sku_id与outer_id至少填写一项，两者都填写时，以sku_id为准）
     */
    public $outerId;

    /**
     * @var string
     * @must true
     * @desc sku京东价.1、只有【虚拟类 】商家以及以下实物类目支持小数点价格。（1）“图书”（1713）;（2）“音乐”（4051）;（3）“影视”（4052）;（4）“影视音像“（4053）;（5）“个护化妆“（1316）.2、其他实物类目，小于100元的，可以支持小数点价格（精确到2位），大于等于100元的，不支持小数点价格。
     */
    public $price;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     * @must false
     * @desc 市场价
     */
    public $marketPrice;

    /**
     * @var string
     * @must false
     * @desc 商品京东价
     */
    public $jdPrice;

    /**
     * @var string
     */
    public $method = '360buy.sku.price.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SkuPriceUpdateApi constructor.
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
        $this->params['price'] = $this->price;
        $this->params['trade_no'] = $this->tradeNo;
        $this->params['market_price'] = $this->marketPrice;
        $this->params['jd_price'] = $this->jdPrice;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sku.price.update&id=95');
    }
}

