<?php
namespace Jd\Api;

interface IApi
{
    /**
     * Get api method name
     *
     * @return mixed
     */
    public function getMethod();

    /**
     * Get api params by json
     *
     * @return mixed
     */
    public function getJsonParams();

    /**
     * @return mixed
     */
    public static function openApiDocument();

}