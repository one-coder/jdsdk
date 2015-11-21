<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class ClubPopVendercommentsGetApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc sku列表
     */
    public $skuIds;

    /**
     * @var string
     * @must false
     * @desc 商品名
     */
    public $wareName;

    /**
     * @var string
     * @must false
     * @format /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/
     * @desc 开始时间 (格式：2015-04-01 00:00:00）
     */
    public $beginTime;

    /**
     * @var string
     * @must false
     * @format /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/
     * @desc 结束时间 (格式：2015-05-01 00:00:00）
     */
    public $endTime;

    /**
     * @var int
     * @must false
     * @format /^[0123]+$/
     * @desc 评价等级（全部0/好3/中2/差评1）
     */
    public $score = 0;

    /**
     * @var string
     * @must false
     * @desc 评价关键字（评价内容）
     */
    public $content;

    /**
     * @var string
     * @must false
     * @desc 用户账号
     */
    public $pin;

    /**
     * @var string
     * @must false
     * @desc 商家是否回复
     */
    public $isVenderReply;

    /**
     * @var string
     * @must false
     * @desc 类目ID
     */
    public $cid;

    /**
     * @var string
     * @must false
     * @desc 订单号(最多50个 用,分隔)
     */
    public $orderIds;

    /**
     * @var int
     * @must true
     * @desc 翻页
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     * @desc 每页条数(最大50)
     */
    public $pageSize = 50;

    /**
     * @var string
     */
    public $method = 'jingdong.club.pop.vendercomments.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * ClubPopVendercommentsGetApi constructor.
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
        $this->params['skuids'] = $this->skuIds;
        $this->params['wareName'] = $this->wareName;
        $this->params['beginTime'] = $this->beginTime;
        $this->params['endTime'] = $this->endTime;
        $this->params['score'] = $this->score;
        $this->params['content'] = $this->content;
        $this->params['pin'] = $this->pin;
        $this->params['isVenderReply'] = $this->isVenderReply;
        $this->params['cid'] = $this->cid;
        $this->params['orderIds'] = $this->orderIds;
        $this->params['page'] = $this->page;
        $this->params['pageSize'] = $this->pageSize;

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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.club.pop.vendercomments.get&id=714');
    }
}

