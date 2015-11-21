<?php
namespace Jd;

class JResult {

    /**
     * 最终请求状态
     *
     * @var boolean
     */
    public $status;

    /**
     * 请求接口名称
     *
     * @var string
     */
    public $methodName;

    /**
     * 请求完整URL
     *
     * @var string
     */
    public $requestUrl;

    /**
     * 返回状态码
     *
     * @var string
     */
    public $code;

    /**
     * 错误信息
     *
     * @var string
     */
    public $errMsg;

    /**
     * 请求接口返回数据
     *
     * @var string
     */
    public $data;

    public function __construct($status,
                                $methodName = '',
                                $requestUrl = '',
                                $code = '',
                                $errorMsg = '',
                                $data = '')
    {
        $this->status     = $status;
        $this->methodName = $methodName;
        $this->requestUrl = $requestUrl;
        $this->code       = $code;
        $this->errMsg     = $errorMsg;
        $this->data       = $data;

        // Write log
        JLog::write(
            $this->status,
            $this->methodName,
            $this->requestUrl,
            $this->code,
            $this->errMsg);
    }

}