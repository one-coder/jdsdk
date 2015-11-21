<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionAddApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 促销名称，字符串长度小于等于10
     */
    public $name;

    /**
     * @var int
     * @must true
     * @desc 促销类型，可选值：单品促销（1），赠品促销（4），套装促销（6），总价促销（10）
     */
    public $type;

    /**
     * @var string
     * @must true
     * @desc 促销开始时间，格式为yyyy-MM-dd HH:mm:ss，精确到分钟，最长可设置为距当前时间180天之内的时间点
     */
    public $beginTime;

    /**
     * @var string
     * @must true
     * @desc 促销结束时间，格式为yyyy-MM-dd HH:mm:ss，精确到分钟，必须大于开始时间至少一分钟，且晚于当前时间，建议至少晚10分钟，且和开始时间最大间隔不能超过180天
     */
    public $endTime;

    /**
     * @var int
     * @must false
     * @desc 促销范围，总价促销为必填项，其它促销类型无效，可选值：部分商品参加（1）、全场参加（2）、部分商品不参加（3），注：M元任选N件只支持部分商品参加
     */
    public $bound;

    /**
     * @var int
     * @must false
     * @desc 会员限制，默认值：注册会员（50），可选值：注册会员（50）、铜牌（56）、银牌（61）、金牌（62）、钻石（105）、VIP（110）
     */
    public $member;

    /**
     * @var string
     * @must false
     * @desc 广告语，字符串长度小于等于50
     */
    public $slogan;

    /**
     * @var string
     * @must false
     * @desc 活动备注，不超过200字节
     */
    public $comment;

    /**
     * @var int
     * @must false
     * @desc 总价促销订单规则类型（总价促销时为必填项，orderMdoe需要和此值保持一致），满赠（0），满减（1），每满减（2），满赠加价购（5），满M件减N件（6），阶梯买M件减N件（7），M元任选N件（13），M件N折（15），满减送（元）（16），满减送（件）（17）
     */
    public $favorMode;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.add';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SellerPromotionAddApi constructor.
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
        $this->params['name'] = $this->name;
        $this->params['type'] = $this->type;
        $this->params['begin_time'] = $this->beginTime;
        $this->params['end_time'] = $this->endTime;
        $this->params['bound'] = $this->bound;
        $this->params['member'] = $this->member;
        $this->params['slogan'] = $this->slogan;
        $this->params['comment'] = $this->comment;
        $this->params['favor_mode'] = $this->favorMode;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.add&id=138');
    }
}

