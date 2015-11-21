<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionPropAddApi implements IApi{

    /**
     * @var number
     * @must ture
     * @desc 促销编号
     */
    public $promoId;

    /**
     * @var number[]
     * @must true
     * @desc 道具类型，可选值：京豆（2）
     */
    public $type;

    /**
     * @var number[]
     * @must true
     * @desc 道具数值，必须为10的倍数，比如类型是京券，则表示多少元
     */
    public $num;

    /**
     * @var number[]
     * @must true
     * @desc 道具使用方式，可选值：消耗（0），奖励（2）。比如，a.使用方式是消耗，则表示促销需要用户使用一定京豆才能生效；b.使用方式是奖励，则表示促销会奖励用户一定的京豆
     */
    public $usedWay;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.prop.add';


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
        $this->params['type'] = $this->type;
        $this->params['num'] = $this->num;
        $this->params['used_way'] = $this->usedWay;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.prop.add&id=185');
    }
}

