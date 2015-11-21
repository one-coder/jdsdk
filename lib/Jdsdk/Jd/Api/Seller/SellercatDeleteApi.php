<?php
namespace Jd\Api\Seller;

use Jd\Api\IApi;
use Jd\JFunc;

class SellercatDeleteApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 类目ID
     */
    public $cid;

    /**
     * @var string
     */
    public $method = '360buy.sellercat.delete';

    /**
     * @var array
     */
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
        $this->params['cid'] = $this->cid;

        JFunc::allDataType2String($this->params);

        //ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.sellercat.delete&id=491');
    }
}

