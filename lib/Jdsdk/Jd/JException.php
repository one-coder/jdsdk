<?php
/**
 * Class JdException
 *
 * @package Jd\Api
 */
class JException extends \Exception {


    const ERROR = 0;

    const WARING = 1;


    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var null
     */
    protected $data;


    /**
     * @param string $message
     * @param int $type
     * @param null $data
     * @param int $code
     */
    public function __construct($message, $type, $data = NULL, $code = 0)
    {
        parent::__construct($message,$code);

        $this->message = $message;
        $this->type    = $type;
        $this->data    = $data;
    }

    /**
     * Echo exception message
     */
    public function printExpInfo()
    {
        header("Content-Type: text/html; charset=utf-8");
        print('Type:'.$this->type.'\n');
        print('Message:'.$this->message.'\n');
        print('Data:'.$this->data.'\n');
        print('Code:'.$this->code.'\n');
        exit();
    }
}