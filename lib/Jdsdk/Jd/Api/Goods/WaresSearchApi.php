<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WaresSearchApi implements IApi{

    /**
     * @var string
     * @must false
     */
    public $cid;

    /**
     * @var int
     * @must false
     * @desc 最小价格（分）
     */
    public $startPrice;

    /**
     * @var int
     * @must false
     * @desc 最大价格（分）
     */
    public $endPrice;

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
     * @desc 商品名称
     */
    public $title;

    /**
     * @var string
     * @must false
     * @desc 排序（默认onlineTime ）(offlineTime,onlineTime)
     */
    public $orderBy = 'onlineTime';

    /**
     * @var string
     * @must false
     * @desc 起始创建时间(created)
     */
    public $startTime;

    /**
     * @var string
     * @must false
     * @desc 结束创建时间(created)
     */
    public $endTime;

    /**
     * @var string
     * @must false
     * @desc 起始的修改时间
     */
    public $startModified;

    /**
     * @var string
     * @must false
     * @desc 结束的修改时间
     */
    public $endModified;

    /**
     * @var int
     * @must false
     * @desc 1:在售;2:待售
     */
    public $wareStatus = 1;

    /**
     * @var string
     * @must false
     * @desc 需返回的字段列表
     */
    public $fields;

    /**
     * @var string
     * @must false
     * @desc 店内分类一级分类
     */
    public $parentShopCategoryId;

    /**
     * @var string
     * @must false
     * @desc 店内分类二级分类
     */
    public $shopCategoryId;

    /**
     * @var string
     * @must false
     * @desc 商品货号
     */
    public $itemNum;

    /**
     * @var string
     */
    public $method = '360buy.wares.search';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WaresSearchApi constructor.
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
        $this->params['cid'] = $this->cid;
        $this->params['start_price'] = $this->startPrice;
        $this->params['end_price'] = $this->endPrice;
        $this->params['page'] = $this->page;
        $this->params['page_size'] = $this->pageSize;
        $this->params['title'] = $this->title;
        $this->params['order_by'] = $this->orderBy;
        $this->params['start_time'] = $this->startTime;
        $this->params['end_time'] = $this->endTime;
        $this->params['start_modified'] = $this->startModified;
        $this->params['end_modified'] = $this->endModified;
        $this->params['ware_status'] = $this->wareStatus;
        $this->params['fields'] = $this->fields;
        $this->params['parentShopCategoryId'] = $this->parentShopCategoryId;
        $this->params['shopCategoryId'] = $this->shopCategoryId;
        $this->params['itemNum'] = $this->itemNum;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.wares.search&id=100');
    }
}

