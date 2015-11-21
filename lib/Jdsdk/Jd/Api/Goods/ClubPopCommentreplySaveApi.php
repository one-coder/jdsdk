<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class ClubPopCommentreplySaveApi implements IApi{

    /**
     * @var string
     * @must true
     * @desc 评价信息主键ID
     */
    public $commentId;

    /**
     * @var string
     * @must true
     * @desc 回复内容
     */
    public $content;

    /**
     * @var string
     * @must true
     * @desc 回复ID（回复主贴用 -1）
     */
    public $replyId;

    /**
     * @var string
     */
    public $method = 'jingdong.club.pop.commentreply.save';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * ClubPopCommentreplySaveApi constructor.
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
        $this->params['commentId'] = $this->commentId;
        $this->params['content'] = $this->content;
        $this->params['replyId'] = $this->replyId;

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
        header('Location:http://jos.jd.com/api/detail.htm?apiName=jingdong.club.pop.commentreply.save&id=713');
    }
}

