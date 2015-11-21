<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreFindPartitionWhByIdAndStatusApi implements IApi{

    /**
     * @var int
     * @must false
     * @desc 库房状态 0表示暂停，1表示使用,2表示查询全部
     */
    public $status;

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
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['status'] = $this->status;

        JFunc::allDataType2String($this->params);
        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.findPartitionWhByIdAndStatus&id=750');
    }
}

