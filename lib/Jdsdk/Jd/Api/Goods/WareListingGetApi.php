<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareListingGetApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc 类目id
     */
    public $cid;

    /**
     * @var int
     * @must true
     * @desc 分页（范围是0至999）
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     * @desc 每页多少条（范围是0至100）
     */
    public $pageSize = 100;

    /**
     * @var string
     * @must false
     * @desc 结束的上架修改时间(online_time) 如不输入，默认返回半年内的上架商品数据
     */
    public $startModified;

    /**
     * @var string
     * @must false
     * @desc 起始的上架修改时间(online_time) 如不输入，默认返回半年内的上架商品数据
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
    public $method = '360buy.ware.listing.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareListingGetApi constructor.
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
     * @throws \JdException
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.listing.get&id=102');
    }
}

