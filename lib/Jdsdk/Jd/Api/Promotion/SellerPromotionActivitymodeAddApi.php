<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionActivitymodeAddApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 促销编号
     */
    public $promoId;

    /**
     * @var int
     * @must false
     * @desc 参与促销的SKU总数量。默认值为0（不限)，或任意正整数；限时抢购时，该参数必须大于0
     */
    public $numBound = 0;

    /**
     * @var int
     * @must false
     * @desc 是否限购一个。默认值为0，可选值：0（不限），1（限购一个）；当设置为限购一个时，单次最多可购数量，单次最少可够数量的设置不再起作用，系统默认会设置为1
     */
    public $freqBound = 0;

    /**
     * @var int
     * @must false
     * @desc 单次最多可购数量，默认值为0（不限），或任意正整数
     */
    public $perMaxNum = 0;

    /**
     * @var int
     * @must false
     * @desc 单次最少可购数量，默认值为0（不限），或任意正整数。赠品促销时不能大于10
     */
    public $perMinNum = 0;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.activitymode.add';


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
        $this->params['num_bound'] = $this->numBound;
        $this->params['freq_bound'] = $this->freqBound;
        $this->params['per_max_num'] = $this->perMaxNum;
        $this->params['per_min_num'] = $this->perMinNum;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.activitymode.add&id=165');
    }
}

