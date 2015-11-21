<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionCheckApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 促销编号
     */
    public $promoId;

    /**
     * @var int
     * @must true
     * @desc 审核状态。可选值：通过（4），驳回（1）
     */
    public $status;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.check';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SellerPromotionCheckApi constructor.
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
        $this->params['promo_id'] = $this->promoId;
        $this->params['status'] = $this->status;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.check&id=213');
    }
}

