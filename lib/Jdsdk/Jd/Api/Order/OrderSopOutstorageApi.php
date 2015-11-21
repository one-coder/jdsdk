<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderSopOutstorageApi implements IApi{


    /**
     * @var string
     * @must true
     * @example 2100|4700
     * @desc 物流公司ID(只可通过获取商家物流公司接口获得),多个物流公司以|分隔
     */
    public $logisticsId ;

    /**
     * @var string
     * @must false
     * @example 1200458628372,111232|468778814888,323232323
     * @desc 运单号(当厂家自送时运单号可为空，不同物流公司的运单号用|分隔，如果同一物流公司有多个运单号，则用英文逗号分隔)
     */
    public $waybill;

    /**
     * @var string
     * @must true
     * @desc 订单id
     */
    public $orderId;

    /**
     * @var string
     * @must false
     * @desc 流水号
     */
    public $tradeNo;

    /**
     * @var string
     */
    public $method = '360buy.order.sop.outstorage';

    /**
     * @var array
     */
    protected $params = array();


    /**
     * OrderSopOutstorageApi constructor.
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
        $this->params['logistics_id'] = $this->logisticsId;
        $this->params['order_id'] = $this->orderId;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.sop.outstorage&id=411');
    }
}

