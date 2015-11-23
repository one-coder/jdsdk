<?php
namespace Jd;

class JConfig {

    /**
     * Config array
     *
     * @var array
     */
    protected $configArr;

    /**
     * The system config options
     *
     * @var array
     */
    protected $optionArr = array(
        array('key'=>'appKey', 'notNul'=>1),
        array('key'=>'appSecret', 'notNul'=>1),
        array('key'=>'redirectUri', 'notNul'=>1),
        array('key'=>'state', 'notNul'=>1),
        array('key'=>'apiUrlHost', 'notNul'=>1),
        array('key'=>'jsonParamKey', 'notNul'=>1),
        array('key'=>'version', 'notNul'=>1),
        array('key'=>'charSet', 'notNul'=>1),
        array('key'=>'connTimeout', 'notNul'=>1),
        array('key'=>'readTimeout', 'notNul'=>1),
        array('key'=>'accessToken', 'notNul'=>0),
        array('key'=>'expiresIn', 'notNul'=>0),
        array('key'=>'refreshToken', 'notNul'=>0),
        array('key'=>'time', 'notNul'=>0),
        array('key'=>'tokenType', 'notNul'=>0),
        array('key'=>'uid', 'notNul'=>0),
        array('key'=>'userNick', 'notNul'=>0),
    );

    /**
     * Config array edit status
     *
     * @var int
     */
    protected $editStatus = 0;

    /**
     * @var self
     */
    private static $_instance;


    /**
     * Initialize config array from config.json
     */
    private function __construct()
    {
        if (!file_exists(JD_CONFIG_FILE_PATH))
        {
            $f = @fopen(JD_CONFIG_FILE_PATH,'wb');
            $f && fclose($f);
        }

        $confJsonStr      = file_get_contents(JD_CONFIG_FILE_PATH);
        $this->configArr  = json_decode($confJsonStr, true);
    }


    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self;
        }
        return self::$_instance;
    }


    /**
     * Verify config file init
     *
     * @return bool
     */
    public function isInit()
    {
        foreach ($this->optionArr as $option) {
            if (!array_key_exists($option['key'], $this->configArr) OR
                is_null($this->configArr[$option['key']]) != $option['notNul'])
            {
                return false;
            }
        }

        return true;
    }



    /**
     * Get config info by key
     *
     * @param string $key
     * @param null $defaultValue
     * @return null
     */
    public function get($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->configArr))
        {
            return $this->configArr[$key];
        }
        return $defaultValue;
    }

    /**
     * Add or edit config info
     *
     * @param string $key
     * @param unknown $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->configArr[$key] = $value;
        $this->editStatus      = 1;
        return $this;
    }


    /**
     * Save config info to file
     *
     * @return bool|int
     */
    public function save()
    {
        if ($this->editStatus)
        {
            $this->editStatus = 0;
            return file_put_contents(JD_CONFIG_FILE_PATH, json_encode($this->configArr));
        }

        return true;
    }
}