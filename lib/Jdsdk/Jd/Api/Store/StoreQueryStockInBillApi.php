<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreQueryStockInBillApi implements IApi{


    /**
     * @var int
     * @must false
     * @desc 入库单状态.0:已删除,1:等待入库,2:入库完成,3:删除失败,4:无法删除,5:删除处理中,6:超期,8:全部
     */
    public $stockInStatus;

    /**
     * @var number
     * @must false
     * @desc 入库单号
     */
    public $stockInBillId;

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
    public $method = 'jingdong.store.queryStockInBill';


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
     */
    public function getJsonParams()
    {
        $this->params['stock_in_status'] = $this->stockInStatus;
        $this->params['stock_in_bill_id'] = $this->stockInBillId;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.queryStockInBill&id=747');
    }
}

