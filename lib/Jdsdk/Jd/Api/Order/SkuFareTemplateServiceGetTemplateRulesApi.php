<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;
use Jd\JFunc;

class SkuFareTemplateServiceGetTemplateRulesApi implements IApi {

    /**
     * @var number
     * @must true
     * @desc 模板ID
     */
    public $templateId;

    /**
     * @var string
     */
    public $method = 'jingdong.SkuFareTemplateService.getTemplateRules';

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
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['template_id'] = $this->templateId;

        JFunc::allDataType2String($this->params);

        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.SkuFareTemplateService.getTemplateRules&id=1019');
    }
}