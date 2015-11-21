<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderFbpSearchApi implements IApi
{

    /**
     * @var string
     * @must true
     * @desc FBP订单查询的开始时间(开始时间和结束时间，不得相差超过1个月。此时间针对订单修改的时间)
     */
    public $startDate;

    /**
     * @var string
     * @must true
     * @desc FBP订单查询的结算时间(开始时间和结束时间，不得相差超过1个月。此时间针对订单修改的时间)
     */
    public $endDate;

    /**
     * @var int
     * @must true
     * @desc 查询的页数，取值范围:大于零的整数;
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     * @desc 每页的条数（取值范围:大于零的整数，最大page_size 100条）
     */
    public $pageSize = 100;

    /**
     * @var string
     * @must false
     * @desc 字段列表
     */
    public $optionalFields;

    /**
     * @var string
     */
    public $method = '360buy.order.fbp.search';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * OrderFbpSearchApi constructor.
     */
    public function __construct() {}

    public function getMethod()
    {
        return $this->method;
    }

    public function getJsonParams()
    {
        //$this->startDate ?: $this->startDate = date('Y-m-d H:i:s', strtotime('-30 day'));
        //$this->endDate ?: $this->endDate = date('Y-m-d H:i:s');

        $this->params['start_date'] = $this->startDate;
        $this->params['end_date'] = $this->endDate;
        $this->params['page'] = $this->page;
        $this->params['page_size'] = $this->pageSize;
        $this->params['optional_fields'] = $this->optionalFields;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }


    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.order.fbp.search&id=404');
    }

}