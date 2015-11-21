<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderSoplOutstorageApi implements IApi{


    /**
     * @var string
     * @must true
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var int
     * @must true
     * @desc 包裹数量
     */
    public $packageNum;

    /**
     * @var string
     * @must true
     * @desc 物流公司id(可通过获取商家物流公司接口获得,0,表示自送)
     */
    public $logisticsId;

    /**
     * @var string
     * @must true
     * @desc 运单号(当自送时运单号可为空)
     */
    public $waybill;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     */
    public $method = '360buy.order.sopl.outstorage';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * OrderSoplOutstorageApi constructor.
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
        $this->params['order_id'] = $this->orderId;
        $this->params['package_num'] = $this->packageNum;
        $this->params['logistics_id'] = $this->logisticsId;
        $this->params['waybill'] = $this->waybill;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.sopl.outstorage&id=413');
    }
}

