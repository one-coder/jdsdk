<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderSearchApi implements IApi
{

    /**
     * @var string
     * @must false
     * @desc WAIT_SELLER_STOCK_OUT 等待出库，则start_date可以为否（开始时间和结束时间均为空，默认返回前一个月的订单），order_state为其他值，则start_date必须为是（开始时间和结束时间，不得相差超过1个月。此时间仅针对订单状态及运单号修改的时间）
     */
    public $startDate;

    /**
     * @var string
     * @must false
     * @desc WAIT_SELLER_STOCK_OUT 等待出库，则start_date可以为否（开始时间和结束时间均为空，默认返回前一个月的订单），order_state为其他值，则start_date必须为是（开始时间和结束时间，不得相差超过1个月。此时间仅针对订单状态及运单号修改的时间）
     */
    public $endDate;

    /**
     * @var string
     * @must true
     * @desc 多订单状态可以用英文逗号隔开 1）WAIT_SELLER_STOCK_OUT 等待出库 2）SEND_TO_DISTRIBUTION_CENER 发往配送中心（只适用于LBP，SOPL商家） 3）DISTRIBUTION_CENTER_RECEIVED 配送中心已收货（只适用于LBP，SOPL商家） 4）WAIT_GOODS_RECEIVE_CONFIRM 等待确认收货 5）RECEIPTS_CONFIRM 收款确认（服务完成）（只适用于LBP，SOPL商家） 6）WAIT_SELLER_DELIVERY等待发货（只适用于海外购商家，等待境内发货 标签下的订单） 7）FINISHED_L 完成 8）TRADE_CANCELED 取消 9）LOCKED 已锁定
     */
    public $orderState;

    /**
     * @var int
     * @must true
     * @desc 查询的页数（最大page值为100）
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     */
    public $pageSize = 100;

    /**
     * @var string
     * @must false
     * @desc 需返回的字段列表。可选值：orderInfo结构体中的所有字段；字段之间用,分隔
     */
    public $optionalFields;

    /**
     * @var int
     * @must false
     * @desc 排序方式，默认升序,1是降序,其它数字都是升序
     */
    public $sortType = 2;

    /**
     * @var int
     * @must false
     * @desc 查询时间类型，默认按修改时间查询。 1为按订单创建时间查询；其它数字为按订单（订单状态、修改运单号）修改时间
     */
    public $dateType = 2;

    /**
     * @var string
     */
    public $method = '360buy.order.search';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * OrderSearchApi constructor.
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
     * Get json encode params
     *
     * @return string
     */
    public function getJsonParams()
    {
        //$this->startDate ?: $this->startDate = date('Y-m-d H:i:s', strtotime('-30 day'));
        //->endDate ?: $this->endDate = date('Y-m-d H:i:s');

        $this->params['start_date'] = $this->startDate;
        $this->params['end_date'] = $this->endDate;
        $this->params['order_state'] = $this->orderState;
        $this->params['page'] = $this->page;
        $this->params['page_size'] = $this->pageSize;
        $this->params['optional_fields'] = $this->optionalFields;
        $this->params['sortType'] = $this->sortType;
        $this->params['dateType'] = $this->dateType;

        JFunc::allDataType2String($this->params);

        // sort by array key
        ksort($this->params);

        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.search&id=393');
    }

}