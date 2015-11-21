<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreQueryStockOutBillApi implements IApi{

    /**
     * @var int
     * @must false
     * @desc 退库单状态.1:等待审核,2:商家已收货,3:退库完成,4:删除成功,6:报废,7:删除处理中,8:全部,9:审核通过,10:驳回,12:等待发货,13:等待退货区收货,14:等待商家自提
     */
    public $stockOutStatus;

    /**
     * @var number
     * @must false
     */
    public $id;

    /**
     * @var number
     * @must false
     * @desc 出库单号
     */
    public $stockOutBillId;

    /**
     * @var number
     * @must false
     */
    public $comId;

    /**
     * @var number
     * @must false
     */
    public $orgId;

    /**
     * @var number
     * @must false
     */
    public $whId;

    /**
     * @var number
     * @must false
     */
    public $skuId;

    /**
     * @var string
     * @must false
     */
    public $beginTime;

    /**
     * @var string
     * @must false
     */
    public $endTime;

    /**
     * @var int
     * @must true
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     */
    public $pageSize = 50;

    /**
     * @var string
     */
    public $method = 'jingdong.store.queryStockOutBill';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * StoreQueryStockOutBillApi constructor.
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
        $this->params['stock_out_status'] = $this->stockOutStatus;
        $this->params['id'] = $this->id;
        $this->params['stock_out_bill_id'] = $this->stockOutBillId;
        $this->params['com_id'] = $this->comId;
        $this->params['org_id'] = $this->orgId;
        $this->params['wh_id'] = $this->whId;
        $this->params['sku_id'] = $this->skuId;
        $this->params['begin_time'] = $this->beginTime;
        $this->params['end_time'] = $this->endTime;
        $this->params['page'] = $this->page;
        $this->params['page_size'] = $this->pageSize;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.queryStockOutBill&id=739');
    }
}

