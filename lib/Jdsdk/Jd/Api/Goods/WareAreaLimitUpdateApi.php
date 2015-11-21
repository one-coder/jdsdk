<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareAreaLimitUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     * @example lev1|lev2|lev3
     * @desc 区域层级列表， 1: 省， 2: 市， 3: 区（目前支持1和2）。以|分隔。 lev为area_ids的级别，levs，area_ids，area_fids个数保证一致。
     */
    public $levs;

    /**
     * @var string
     * @must true
     * @example areaId1,areaId11,areaId111|areaId2,areaId22,areaId222
     * @desc 区域编号列表，以|分隔，如果一个区域父编号对应多个区别编号，以英文逗号分隔。area_ids最小只能到达市一级，不能到达区县级或者乡镇一级。 levs，area_ids，area_fids个数保证一致，区域id获取调用http://help.jd.com/jos/question-827.html中的接口
     */
    public $areaIds;

    /**
     * @example areaFid1|areaFid2|areaFid3
     * @var string
     * @must true
     * @desc 区域父编号列表，以|分隔。如果设置区域id没有父区域，需用0表示。levs，area_ids，area_fids个数保证一致
     */
    public $areaFids;

    /**
     * @var string
     * @must true
     * @desc 商品id，必选
     */
    public $wareId;

    /**
     * @var int
     * @must true
     * @desc 业务类型 1:限购(目前只支持限购)
     */
    public $type = 1;

    /**
     * @var string
     */
    public $method = '360buy.ware.area.limit.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareAreaLimitUpdateApi constructor.
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
        $this->params['levs'] = $this->levs;
        $this->params['area_ids'] = $this->areaIds;
        $this->params['area_fids'] = $this->areaFids;
        $this->params['ware_id'] = $this->wareId;
        $this->params['type'] = $this->type;

        // change all data type to string
        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.area.limit.update&id=104');
    }
}

