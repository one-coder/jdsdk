<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareTemplateAddApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 关联版式名称，最大10个字符,必选
     */
    public $name;

    /**
     * @var string[]
     * @must true
     * @example [“顶部内容所需要输入的内容，例如：花好月圆”,null]
     * @desc 顶部模板与底部模板分别最大字符是10000个字符, 格式:{“顶部内容所需要输入的内容，例如：花好月圆“,“底部所需要输入的内容,例如：阴晴圆缺”},如果只添加顶部内容,格式:{”顶部内容所需要输入的内容，例如：花好月圆“,null};如果只添加底部内容，格式:{null,”底部所需要输入的内容,例如：阴晴圆缺“};
     */
    public $contents;

    /**
     * @var string
     */
    public $method = '360buy.ware.template.add';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareTemplateAddApi constructor.
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
        $this->params['name'] = $this->name;
        $this->params['contents'] = $this->contents;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.template.add&id=127');
    }
}

