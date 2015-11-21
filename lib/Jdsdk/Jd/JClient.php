<?php
namespace Jd;

use Jd\Api\IApi;

class JClient {

    /**
     * @var null
     */
    protected $requests = null;

    /**
     * @var null
     */
    protected $requestUrl = null;


    protected $appKey;
    protected $appSecret;
    protected $accessToken;
    protected $apiUrlHost = 'https://api.jd.com/routerjson';
    protected $jsonParamKey = '360buy_param_json' ;
    protected $version = '2.0';
    protected $charSet = 'UTF8';
    protected $connTimeout = 60;
    protected $readTimeout = 200;

    protected $urlParams = array();

    protected static $_instance;


    private function __construct()
    {
        $config = JRegister::get('config');

        $this->appKey       = $config->get('appKey');
        $this->appSecret    = $config->get('appSecret');
        $this->accessToken  = $config->get('accessToken');
        $this->version      = $config->get('version') ;
        $this->requestUrl   = $config->get('requestUrl');
        $this->jsonParamKey = $config->get('jsonParamKey');
        $this->charSet      = $config->get('charSet');
        $this->connTimeout  = $config->get('connTimeout');
        $this->readTimeout  = $config->get('readTimeout');

        $this->urlParams['v']            = $this->version;
        $this->urlParams['app_key']      = $this->appKey;
        $this->urlParams['access_token'] = $this->accessToken;
    }


    /**
     * Get JClient object
     *
     * @return JClient
     */
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * @param IApi $api
     * @return JResult|void
     */
    public function execute(IApi $api)
    {
        $this->urlParams['method']            = $api->getMethod();
        $this->urlParams[$this->jsonParamKey] = $api->getJsonParams();
        $this->urlParams['timestamp']         = date('Y-m-d H:i:s');
        $this->urlParams['sign']              = $this->createRequestUrlSign($this->urlParams);

        // Create request url
        $this->requestUrl = $this->createRequestUrl($this->urlParams);

        // Send post request
        $this->requests = \Requests::post($this->requestUrl);


        //$error = JdError::getInstance();
        // Http request success
        if (200 === $this->requests->status_code)
        {
            $respJsonStr = $this->requests->body;
            $respJsonObj = json_decode($respJsonStr);

            /**
             * error response template
             * {"error_response": {"code":"21","zh_desc":"key=0 信息无效","en_desc":"Invalid app_key"}}
             */
            if (isset($respJsonObj->error_response))
            {
                return $result = new JResult(false,
                    $this->urlParams['method'],
                    $this->requestUrl,
                    $respJsonObj->error_response->code,
                    $respJsonObj->error_response->zh_desc
                );
            }

            return new JResult(true,
                $this->urlParams['method'],
                $this->requestUrl, '0', '', $respJsonStr);
        }

        return new JResult(false,
            $this->urlParams['method'],
            $this->requestUrl,
            $this->requests->status_code,
            $this->requests->raw);
    }


    /**
     * Get request obj
     *
     * @return null
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Get request url
     *
     * @return null
     */
    public function getRequestUrl()
    {
        return htmlentities($this->requestUrl);
    }

    /**
     * Create request url
     *
     * @param $params
     * @return string
     */
    private function createRequestUrl($params)
    {
        $url = $this->apiUrlHost . '?';
        $i = 0;
        foreach ($params as $k => $v)
        {
            $url .= "$k=$v";
            ++$i === count($this->urlParams) ?: $url .= '&';
        }

        return $url;
    }

    /**
     * Create sign
     *
     * @param $params
     * @return string
     */
    private function createRequestUrlSign($params)
    {
        if (is_array($params) && 0 < count($params))
        {
            ksort($params);
            $signStr = $this->appSecret;
            foreach ($params as $k => $v)
            {
                $signStr .= "$k$v";
            }
            $signStr .= $this->appSecret;
        }

        $result = isset($signStr) ?: $this->appSecret.$this->appSecret;
        return strtoupper(md5($result));
    }

}