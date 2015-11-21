<?php
namespace Jd;

abstract class Oauth2 {

    /**
     * Empty construct method
     */
    public function __construct() {}


    /**
     * @param array $params
     */
    public static function oauth2($params = array())
    {
        // Get config
        $config      = JRegister::get('config');

        $appKey      = $config->get('appKey');
        $redirectUri = $config->get('redirectUri');
        $state       = $config->get('state');

        $url = "https://oauth.jd.com/oauth/authorize?response_type=code" .
               "&client_id=$appKey" .
               "&redirect_uri=$redirectUri" .
               "&state=$state";
        //https://oauth.jd.com/oauth/authorize?response_type=code&client_id=E02B9937950FE5CA0A013BB9428C7798&redirect_uri=http://www.ecyake.com/api/360buy/callback.php&state=yake
        //https://oauth.jd.com/oauth/authorize?response_type=code&client_id=B652559DF20C6C1D37E1FB08544803E7&redirect_uri=http://jddev.one-coder.com/redirect.php&state=1234
        header('Location:' . $url);
    }


    /**
     * @param bool|false $return
     * @return bool
     * @throws \JException
     */
    public static function redirect($return = false)
    {
        $code  = $_REQUEST['code'];
        $state = $_REQUEST['state'];

        // If no code or state param in url, or empty value
        if (!($code && $state))
        {
            throw new \JException('回调url中没有code和state字段信息', \JException::ERROR);
        }

        $config = JRegister::get('config');
        // verify state value
        if ($state !== $config->get('state'))
        {
            throw new \JException('status字段不一致', \JException::ERROR);
        }

        $appKey      = $config->get('appKey');
        $appSecret   = $config->get('appSecret');
        $redirectUri = $config->get('redirectUri');

        // Construct url to get access token
        $url = 'https://oauth.jd.com/oauth/token?grant_type=authorization_code' .
               '&client_id=' . $appKey .
               '&client_secret=' . $appSecret .
               '&scope=read&redirect_uri=' . $redirectUri .
               '&code=' . $code .
               '&state=' . $state;

        $result = file_get_contents($url);
        $resultObj = json_decode($result);

        // Get access token successful
        if ($resultObj->code === 0)
        {
            // Save access token info
            $config->set('accessToken', $resultObj->access_token)
                   ->set('expiresIn', $resultObj->expires_in)
                   ->set('refreshToken', $resultObj->refresh_token)
                   ->set('time', $resultObj->time)
                   ->set('tokenType', $resultObj->token_type)
                   ->set('uid', $resultObj->uid)
                   ->set('userNick',$resultObj->user_nick)
                   ->save();

            if (!$config)
            {
                throw new \JException(\JException::ERROR, '保存access token信息失败');
            }
        }
        else
        {
            throw new \JException(\JException::ERROR, '保存access token信息失败', $result, $resultObj->code);
        }

        if ($return) return $resultObj;

        return true;
    }

    /**
     * Verify authorizes is overdue or not
     *
     * @return bool
     */
    public static function isOverdue()
    {
        $config = JRegister::get('config');

        // Verify access token exist
        if (!$config->get('accessToken', false))
        {
            return false;
        }

        // Verify oauth start time and expires_in exist
        $oauthStartTime  = $config->get('time');
        $oauthLengthTime = $config->get('expiresIn');
        if (!$oauthStartTime || !$oauthLengthTime)
        {
            return false;
        }

        // Verify oauth end time is useful or not
        return !($oauthStartTime/1000 + $oauthLengthTime < time());
    }

}