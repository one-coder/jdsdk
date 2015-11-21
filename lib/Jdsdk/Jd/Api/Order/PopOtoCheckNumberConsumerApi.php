<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class PopOtoCheckNumberConsumerApi implements IApi{

    /**
     * @var number
     * @must true
     * @desc 商家ID
     */
    public $venderId;

    /**
     * @var number
     * @must true
     * @desc 订单号
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
     * @var number
     * @must false
     * @desc 消费门店ID
     */
    public $shopId;

    /**
     * @var string
     * @must false
     * @desc 消费门店名称
     */
    public $shopName;

    /**
     * @var int
     * @must true
     * @desc 验证码类型(0表示京东生成码，1表示商家生成码)
     */
    public $codeType = 1;

    /**
     * @var string
     */
    public $method = 'jingdong.pop.oto.CheckNumber.consumer';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * PopOtoCheckNumberConsumerApi constructor.
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
        $this->params['vender_id'] = $this->venderId;
        $this->params['order_id'] = $this->orderId;
        $this->params['card_number'] = $this->cardNumber;
        $this->params['pwd_number'] = $this->pwdNumber;
        $this->params['shop_id'] = $this->shopId;
        $this->params['shop_name'] = $this->shopName;
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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.pop.oto.CheckNumber.consumer&id=595');
    }
}

