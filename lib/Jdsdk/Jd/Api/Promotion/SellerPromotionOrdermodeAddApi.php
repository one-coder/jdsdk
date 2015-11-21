<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionOrdermodeAddApi implements IApi{

    /**
     * @var number
     * @must true
     */
    public $promoId;

    /**
     * @var int
     * @must true
     * @desc 订单规则类型，可选值：满赠（0），满减（1），每满减（2），满赠加价购（5），满M件减N件（6），阶梯买M件减N件（7），M元任选N件（13），M件N折（15），满减送（元）（16），满减送（件）（17）
     */
    public $favorMode;

    /**
     * @var number[]
     * @must true
     * @desc 订单额度；（满M件减N件或M件N折时为M的值，单位件，只支持正整数；M元任选N件时为M的值，单位元，支持小数点后一位，例：9.9元；满减送时为订单满金额，单位元，只支持正整数；）
     */
    public $quota;

    /**
     * @var number[]
     * @must false
     * @desc 优惠力度；（满M件减N件、M元任选N件时为N的值，单位件,只支持正整数；M件N折时为N的值，单位折，支持小数点后一位，例：8.5折；满减送不支持此字段，除满减送之外其它促销为必填项）
     */
    public $rate;

    /**
     * @var number[]
     * @must false
     * @desc 加价金额，只支持正整数；（只满减送有效，且为可选项，该字段设置了值，必须送赠品）
     */
    public $plus;

    /**
     * @var number[]
     * @must false
     * @desc 减金额，只支持正整数；（只满减送有效，且为可选项）
     */
    public $minus;

    /**
     * @var string
     * @must false
     * @desc 店铺活动链接地址
     */
    public $link;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.ordermode.add';


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
        $this->params['promo_id'] = $this->promoId;
        $this->params['favor_mode'] = $this->favorMode;
        $this->params['quota'] = $this->quota;
        $this->params['rate'] = $this->rate;
        $this->params['plus'] = $this->plus;
        $this->params['minus'] = $this->minus;
        $this->params['link'] = $this->link;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.ordermode.add&id=268');
    }
}

