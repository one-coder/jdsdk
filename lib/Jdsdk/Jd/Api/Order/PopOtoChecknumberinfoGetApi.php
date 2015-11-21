<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class PopOtoChecknumberinfoGetApi implements IApi{

    /**
     * @var number
     * @must false
     * @desc 订单ID
     */
    public $orderId;

    /**
     * @var string
     * @must false
     * @desc 卡号
     */
    public $cardNumber;

    /**
     * @var string
     * @must true
     * @desc 密码
     */
    public $pwdNumber;

    /**
     * @var string
     */
    public $method = 'jingdong.pop.oto.checknumberinfo.get';


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
        $this->params['order_id'] = $this->orderId;
        $this->params['card_number'] = $this->cardNumber;
        $this->params['pwd_number'] = $this->pwdNumber;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.pop.oto.checknumberinfo.get&id=596');
    }
}

