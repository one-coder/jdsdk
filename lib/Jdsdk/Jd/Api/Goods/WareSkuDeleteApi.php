<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareSkuDeleteApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc sku的id
     */
    public $skuId;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     */
    public $method = '360buy.ware.sku.delete';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * @var string
     */
    protected static $apiDocumentUrl = '';

    /**
     * WareSkuDeleteApi constructor.
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.sku.delete&id=96');
    }
}

