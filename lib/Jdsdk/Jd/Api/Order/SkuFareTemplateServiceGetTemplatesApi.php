<?php
namespace Jd\Api\Order;

use Jd\Api\IApi;

class SkuFareTemplateServiceGetTemplatesApi implements IApi {

    /**
     * @var string
     */
    public $method = 'jingdong.SkuFareTemplateService.getTemplates';

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
        // Set params to object
        $this->params = new \stdClass();
        return json_encode($this->params);
    }

    /**
     * Open api document page
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.SkuFareTemplateService.getTemplates&id=1020');
    }
}