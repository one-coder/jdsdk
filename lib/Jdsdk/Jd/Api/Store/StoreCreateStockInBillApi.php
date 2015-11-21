<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreCreateStockInBillApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 预计到达天数
     */
    public $arrivalDay;

    /**
     * @var number
     * @must true
     * @desc 分公司ID
     */
    public $comId;

    /**
     * @var number
     * @must true
     * @desc 机构ID
     */
    public $orgId;

    /**
     * @var number
     * @must true
     * @desc 库房ID
     */
    public $whId;

    /**
     * @var number[]
     * @must true
     * @desc sku编码
     */
    public $skuCode;

    /**
     * @var number[]
     * @must true
     * @desc sku数量
     */
    public $num;

    /**
     * @var string
     * @must false
     * @desc 备注
     */
    public $remark;

    /**
     * @var string
     */
    public $method = 'jingdong.store.createStockInBill';


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
        $this->params['arrivalDay'] = $this->arrivalDay;
        $this->params['com_id'] = $this->comId;
        $this->params['org_id'] = $this->orgId;
        $this->params['wh_id'] = $this->whId;
        $this->params['sku_code'] = $this->skuCode;
        $this->params['num'] = $this->num;
        $this->params['remark'] = $this->remark;

        // change all data type to string
        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.createStockInBill&id=749');
    }
}

