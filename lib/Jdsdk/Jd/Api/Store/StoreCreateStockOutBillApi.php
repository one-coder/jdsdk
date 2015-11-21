<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreCreateStockOutBillApi implements IApi{

    /**
     * @var number
     * @must true
     */
    public $comId;

    /**
     * @var number
     * @must true
     */
    public $orgId;

    /**
     * @var number
     * @must true
     */
    public $whId;

    /**
     * @var number[]
     * @must true
     */
    public $skuCode;

    /**
     * @var number[]
     * @must true
     */
    public $num;

    /**
     * @var string
     * @must false
     */
    public $remark;

    /**
     * @var string
     */
    public $method = 'jingdong.store.createStockOutBill';


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
        $this->params['com_id'] = $this->comId;
        $this->params['org_id'] = $this->orgId;
        $this->params['wh_id'] = $this->whId;
        $this->params['sku_code'] = $this->skuCode;
        $this->params['num'] = $this->num;
        $this->params['remark'] = $this->remark;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.createStockOutBill&id=740');
    }
}

