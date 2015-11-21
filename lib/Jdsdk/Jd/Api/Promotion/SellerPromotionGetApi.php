<?php
namespace Jd\Api\Promotion;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerPromotionGetApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 促销编号
     */
    public $promoId;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.promotion.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SellerPromotionGetApi constructor.
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

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.promotion.get&id=236');
    }
}

