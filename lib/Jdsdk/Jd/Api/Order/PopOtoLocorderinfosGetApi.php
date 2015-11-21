<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class PopOtoLocorderinfosGetApi implements IApi{

    /**
     * @var int
     * @must true
     * @desc 查询时间的类型，1表示码状态的修改时间，2表示订单创建时间
     */
    public $timeType = 1;

    /**
     * @var string
     * @must true
     * @desc 开始时间(格式如：2014-07-21 13:50:00)
     */
    public $startDate;

    /**
     * @var string
     * @must true
     * @desc 结束时间(格式如：2014-07-21 13:50:00,开始时间和结束时间相差不能超过30天)
     */
    public $endDate;

    /**
     * @var int
     * @must true
     * @desc 码状态(-1：已退款，0：等待发码，1：未消费，2：已消费，3：已过期，101：退款锁定，103：过期锁定)
     */
    public $codeStatus = 1;

    /**
     * @var int
     * @must true
     * @desc 码类型(0代表码是京东生成，1代表商家生成码)
     */
    public $codeType = 1;

    /**
     * @var int
     * @must true
     * @desc 页码
     */
    public $pageIndex = 1;

    /**
     * @var int
     * @must true
     * @desc 每页返回多少记录，最多不能超过1000条
     */
    public $pageSize = 1000;

    /**
     * @var string
     */
    public $method = 'jingdong.pop.oto.locorderinfos.get';


    protected $params = array();

    /**
     * @var string
     */
    protected static $apiDocumentUrl = '';


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
        //$this->startDate ?: $this->startDate = date('Y-m-d H:i:s', strtotime('-30 day'));
        //$this->endDate ?: $this->endDate = date('Y-m-d H:i:s');

        $this->params['time_type'] = $this->timeType;
        $this->params['start_date'] = $this->startDate;
        $this->params['end_date'] = $this->endDate;
        $this->params['code_status'] = $this->codeStatus;
        $this->params['code_type'] = $this->codeType;
        $this->params['page_index'] = $this->pageIndex;
        $this->params['page_size'] = $this->pageSize;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.pop.oto.locorderinfos.get&id=593');
    }
}

