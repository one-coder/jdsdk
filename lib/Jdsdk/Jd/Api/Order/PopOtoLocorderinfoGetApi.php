<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class PopOtoLocorderinfoGetApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var int
     * @must true
     * @desc 码类型(0代表码是京东生成，1代表商家生成码)
     */
    public $codeType = 1;

    /**
     * @var string
     */
    public $method = 'jingdong.pop.oto.locorderinfo.get';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * PopOtoLocorderinfoGetApi constructor.
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
        $this->params['order_id'] = $this->orderId;
        $this->params['code_type'] = $this->codeType;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.pop.oto.locorderinfo.get&id=594');
    }
}

