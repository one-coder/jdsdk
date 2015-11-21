<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;
use Jd\JFunc;

class SellerVenderInfoGetApi implements IApi{

    /**
     * @var string
     * @must false
     * @desc 预留的参数为，json格式
     */
    public $extJsonParam;

    /**
     * @var string
     */
    public $method = 'jingdong.seller.vender.info.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * SellerVenderInfoGetApi constructor.
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
        $this->params['ext_json_param'] = $this->extJsonParam;

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.seller.vender.info.get&id=493');
    }
}

