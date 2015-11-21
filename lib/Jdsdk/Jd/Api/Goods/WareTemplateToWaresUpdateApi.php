<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareTemplateToWaresUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     */
    public $id;

    /**
     * @var string
     * @must true
     * @desc 商品编号集合，最大不超过20个
     */
    public $wareIds;

    /**
     * @var string
     */
    public $method = '360buy.ware.template.to.wares.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareTemplateToWaresUpdateApi constructor.
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
        $this->params['id'] = $this->id;
        $this->params['ware_ids'] = $this->wareIds;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.template.to.wares.update&id=120');
    }
}

