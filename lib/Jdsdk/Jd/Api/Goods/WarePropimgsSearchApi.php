<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WarePropimgsSearchApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 商品的id
     */
    public $wareId;

    /**
     * @var int
     * @must true
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
     * @desc 可选字段
     */
    public $fields;

    /**
     * @var string
     */
    public $method = '360buy.ware.propimgs.search';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WarePropimgsSearchApi constructor.
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
        $this->params['ware_id'] = $this->wareId;
        $this->params['page'] = $this->page;
        $this->params['page_size'] = $this->pageSize;
        $this->params['fields'] = $this->fields;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.propimgs.search&id=107');
    }
}

