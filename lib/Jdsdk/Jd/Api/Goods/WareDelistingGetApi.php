<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareDelistingGetApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc 类目id
     */
    public $cid;

    /**
     * @var int
     * @must true
     * @desc 分页
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     * @desc 每页多少条
     */
    public $pageSize = 100;

    /**
     * @var string
     * @must false
     * @example 2012-11-01 00:00:00
     * @desc 结束的下架修改时间(offline_time)
     */
    public $startModified;

    /**
     * @var string
     * @must false
     * @example 2011-11-01 00:00:00
     * @desc 起始的下架修改时间(offline_time)
     */
    public $endModified;

    /**
     * @var string
     * @must false
     * @example ware_id,spu_id
     * @desc 需返回的字段列表。可选值：ware结构体中的所有字段；字段之间用,分隔
     */
    public $fields;


    /**
     * @var string
     */
    public $method = '360buy.ware.delisting.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareDelistingGetApi constructor.
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
        $this->params['cid'] = $this->cid;;
        $this->params['page'] = $this->page;
        $this->params['page_size'] = $this->pageSize;
        $this->params['start_modified'] = $this->startModified;
        $this->params['end_modified'] = $this->endModified;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.delisting.get&id=101');
    }
}

