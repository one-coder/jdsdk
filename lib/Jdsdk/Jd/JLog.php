<?php
namespace Jd;

class JLog {

    public function __construct()
    {
    }


    public static function write($status, $methodName, $url, $requestCode = '', $info = '')
    {
        $logFilePath = JD_LOG_PATH . date('Y-m-d') . '.log';
        $logBody = '';
        $status ? $logBody .= '[成功]' : $logBody .= '[失败]';
        $logBody .= '[' . date('Y-m-d H:i:s') . ']';
        $logBody .= '[' . $methodName . ']';
        $logBody .= '[' . $url . ']';
        $logBody .= '[' . $requestCode . ']';
        $logBody .= '[' . $info . ']';
        $logBody .= PHP_EOL;

        return file_put_contents($logFilePath, $logBody, FILE_APPEND);
    }

    public static function delete($date = null)
    {

    }

}