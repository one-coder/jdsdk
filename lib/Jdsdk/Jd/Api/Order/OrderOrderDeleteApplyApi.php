<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class OrderOrderDeleteApplyApi implements IApi {

    /**
     * @var number
     * @must true
     * @desc 订单编号
     */
    public $orderId;

    /**
     * @var int
     * @must true
     * @desc 删单类型，用数字1-9来表示.数字含意如下：1、商品无货/有瑕疵，请京东联系客户取消订单；2、商品无货/有瑕疵，已经联系客户同意取消，请京东直接删单；3、客户要求取消订单，请京东直接删单；4、3COD货到付款订单，客户拒收，已经联系客户同意取消，请京东直接删单；5、3COD货到付款订单，客户拒收，无法联系上客户；6、客户电话无法接通，无法安排发货；7、客户下单不符合购买规则，无法安排发货；8、客户地址无法配送，请京东联系客户取消订单；9、其他（请在删单描述中写明具体原因）
     */
    public $delApplyType;

    /**
     * @var string
     * @must false
     * @example 由于某些原因，不能发货
     * @desc 删单原因描述
     */
    public $delApplyReason;

    /**
     * @var string
     */
    public $method = 'jingdong.order.orderDelete.apply';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * Empty construct method
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
        $this->params['order_id'] = $this->orderId;
        $this->params['del_apply_type'] = $this->delApplyType;
        $this->params['del_apply_reason'] = $this->delApplyReason;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.order.orderDelete.apply&id=547');
    }
}