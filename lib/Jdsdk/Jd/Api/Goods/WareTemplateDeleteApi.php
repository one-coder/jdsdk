<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareTemplateDeleteApi implements IApi{

    /**
     * @var string
     * @must true
     */
    public $id;

    /**
     * @var string
     */
    public $method = '360buy.ware.template.delete';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareTemplateDeleteApi constructor.
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
        $this->params['id'] = $this->id;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.template.delete&id=111');
    }
}

