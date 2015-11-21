<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionListApi implements IApi{

    /**
     * @var int
     * @must true
     * @desc 促销类型，可选值：单品促销（1），赠品促销（4），套装促销（6）,总价促销（10）
     */
    public $type;

    /**
     * @var int
     * @must false
     * @desc 促销状态，可选值：驳回（1），未审核（2），人工审核（3），审核通过（4），已生效（5）
     */
    public $status;

    /**
     * @var string
     * @must false
     * @desc 促销开始时间，格式为yyyy-MM-dd HH:mm:ss，（查询促销开始时间大于等于该值的促销）
     */
    public $beginTime;

    /**
     * @var string
     * @must false
     * @desc 促销结束时间，格式为yyyy-MM-dd HH:mm:ss，（查询促销结束时间小于等于该值的促销）
     */
    public $endTime;

    /**
     * @var number
     * @must false
     * @desc 商品skuId（查询sku参加的促销）
     */
    public $skuId;

    /**
     * @var int
     * @must false
     * @desc 总价促销订单规则类型，可选值为：满赠（0），满减（1），多买优惠（7），满减送（16）
     */
    public $favorMode;

    /**
     * @var int
     * @must true
     * @desc 页码（必须为正整数）
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     * @desc 每页记录个数（每页最少1个，最多10个）
     */
    public $pageSize = 10;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.list';


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
        $this->params['type'] = $this->type;
        $this->params['status'] = $this->status;
        $this->params['begin_time'] = $this->beginTime;
        $this->params['end_time'] = $this->endTime;
        $this->params['sku_id'] = $this->skuId;
        $this->params['favor_mode'] = $this->favorMode;
        $this->params['page'] = $this->page;
        $this->params['size'] = $this->pageSize;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.list&id=260');
    }
}

