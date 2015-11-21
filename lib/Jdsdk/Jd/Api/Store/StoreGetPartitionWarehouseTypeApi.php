<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreGetPartitionWarehouseTypeApi implements IApi{

    /**
     * @var number
     * @must false
     * @desc 库房编号
     */
    public $seqNum;

    /**
     * @var string
     */
    public $method = 'jingdong.store.getPartitionWarehouseType';


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
        $this->params['seq_num'] = $this->seqNum;

        JFunc::allDataType2String($this->params);
        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.getPartitionWarehouseType&id=751');
    }
}

