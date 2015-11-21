<?php
namespace Jd\Api\Store;

use Jd\Api\IApi;
use Jd\JFunc;

class StoreQueryStoreHouseRentlistApi implements IApi{

    /**
     * @var int
     * @must true
     */
    public $page = 2;

    /**
     * @var int
     * @must true
     */
    public $pageSize = 50;

    /**
     * @var string
     */
    public $method = 'jingdong.store.queryStoreHouseRentlist';


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
        $this->params['page'] = $this->page;
        $this->params['pageSize'] = $this->pageSize;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.store.queryStoreHouseRentlist&id=746');
    }
}

