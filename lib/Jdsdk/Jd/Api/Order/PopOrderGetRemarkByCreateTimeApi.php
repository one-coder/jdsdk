<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class PopOrderGetRemarkByCreateTimeApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 查询时间段起始点（起始时间与结束时间相差不超过30天）
     */
    public $startTime;

    /**
     * @var string
     * @must true
     * @desc 查询时间段结束点（起始时间与结束时间相差不超过30天）
     */
    public $endTime;

    /**
     * @var int
     * @must true
     * @desc 页码，查询第几页，必须>=1。(pageSize=100)
     */
    public $page = 1;

    /**
     * @var int
     * @must true
     * @desc 1 正序 -1倒序
     */
    public $sortTime = 1;

    /**
     * @var string
     */
    public $method = 'jingdong.pop.order.getRemarkByCreateTime';


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
        //$this->startTime ?: $this->startTime = date('Y-m-d H:i:s', strtotime('-30 day'));
        //$this->endTime ?: $this->endTime = date('Y-m-d H:i:s');

        $this->params['startTime'] = $this->startTime;
        $this->params['endTime'] = $this->endTime;
        $this->params['page'] = $this->page;
        $this->params['sortTime'] = $this->sortTime;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.pop.order.getRemarkByCreateTime&id=744');
    }
}

