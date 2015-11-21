<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreDeleteStockInBilApi implements IApi{


    /**
     * @var string
     * @must true
     * @desc 入库单号
     */
    public $stockInBillId;

    /**
     * @var string
     */
    public $method = 'jingdong.store.deleteStockInBill';


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
        $this->params['stock_in_bill_id'] = $this->stockInBillId;

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
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

