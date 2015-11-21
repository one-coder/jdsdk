<?php
namespace Jd\Api;

/**
 * Class JdApiVerify
 * @package Jd\Api
 *
 * Api 统一验证类
 *
 * 根据Api对应注释,验证Api参数的合法性,并生产验证报告
 *
 * '@var'     类型,参数类型(string 字符串 number 数字字符串 bool 布尔 int 整型)
 *
 * '@must'    true|false,参数是否必须
 *
 * '@format'  数据格式,正则表达式
 *
 * '@example' 示例值
 *
 * '@desc'    描述,参数详细描述
 */

class JApiVerify {

    private static $verifyRstDoc;

    /**
     * @param IApi $api
     */
    public static function verify(IApi $api)
    {
        $reflection = new \ReflectionClass($api);
        // Get public properties
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        if (is_array($properties) && count($properties))
        {
            foreach ($properties as $property)
            {
                $verifyRstItem = array();

                $obj = new \ReflectionProperty($api, $property->name);
                // Get all annotations
                $annotations = $obj->getDocComment();
                $verifyRstItem['name'] = $property->name;
                $verifyRstItem['value'] = $api->{$property->name};
                // Get all verify option
                // Verify param data type
                preg_match('/@var (.*?)\n/', $annotations, $var);
                if (is_array($var) && 2 <= count($var))
                {
                    $verifyRstItem['var'] = JApiVerify::verifyDataType(trim($var[1]),$api->{$property->name});
                }

                preg_match('/@must (.*?)\n/', $annotations, $must);
                if (is_array($must) && 2 <= count($must))
                {
                    $verifyRstItem['must'] = JApiVerify::verifyMust(trim($must[1]), $api->{$property->name});
                }

                preg_match('/@format (.*?)\n/', $annotations, $format);
                if (is_array($format) && 2 <= count($format))
                {

                    if (preg_match(trim($format[1]), strval($api->{$property->name})))
                    {
                        $verifyRstItem['format'] = true;
                    }
                    else
                    {
                        $verifyRstItem['format'] = array('tVal'=>trim($format[1]), 'eVal'=>'数据格式验证不通过');
                    }
                }

                preg_match('/@example (.*?)\n/', $annotations, $example);
                if (is_array($example) && 2 <= count($example))
                {
                    $verifyRstItem['example'] = $example[1];
                }

                preg_match('/@desc (.*?)\n/', $annotations, $desc);
                if (is_array($desc) && 2 <= count($desc))
                {
                    $verifyRstItem['desc'] = $desc[1];
                }

                self::$verifyRstDoc[] = $verifyRstItem;
            }
        }
    }


    /**
     * Print verify result
     */
    public static function printVerifyInfo()
    {

        $html = '<!-- CSS goes in the document HEAD or added to your external stylesheet -->
                <style type="text/css">
                table.gridtable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #666666;
                    border-collapse: collapse;
                }
                table.gridtable th {
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #666666;
                    background-color: #dedede;
                }
                table.gridtable td {
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #666666;
                    background-color: #ffffff;
                }
                </style>

                <p style="color: gray; padding-top: 10px; text-align: center;">说明: &radic;表示当前验证项符合验证规则,/表示当前项没有定义验证规则,其他相关看文字说明</p>

                <!-- Table goes in the document BODY -->
                <table class="gridtable">
                <tr>
                    <th width="8%">name(参数名称)</th>
                    <th width="10%">value(参数实际值)</th>
                    <th width="10%">var(参数类型)</th>
                    <th width="15%">must(是否必须)</th>
                    <th width="15%">format(参数格式)</th>
                    <th width="15%">example(示例值)</th>
                    <th>desc(参数描述)</th>
                </tr>';

        foreach (self::$verifyRstDoc as $item)
        {
            $html .= '<tr>';
            $html .= '<td>' . $item['name'] . '</td>';
            $html .= '<td>' . $item['value'] . '</td>';
            if (true === $item['var'])
            {
                $html .= '<td><i style="color: red;">&radic;</i></td>';
            }
            else
            {
                $html .= '<td><b style="color: red;">error</b><br>[要求]' . $item['var']['tVal'] . '<br>[结果]' . $item['var']['eVal'];
            }

            if (isset($item['must']))
            {
                if (true === $item['must'])
                {
                    $html .= '<td><i style="color: red;">&radic;</i></td>';
                }
                else
                {
                    $html .= '<td><b style="color: red;">error</b><br>[要求]' . $item['must']['tVal'] . '<br>[结果]' . $item['must']['eVal'];
                }
            }
            else
            {
                $html .= '<td>/</td>';
            }


            if (isset($item['format']))
            {
                if (true === $item['format'])
                {
                    $html .= '<td><i style="color: red;">&radic;</i></td>';
                }
                else
                {
                    $html .= '<td><b style="color: red;">error</b><br>[要求]' . $item['format']['tVal'] . '<br>[结果]' . $item['format']['eVal'];
                }
            }
            else
            {
                $html .= '<td>/</td>';
            }

            if (isset($item['example']))
            {
                $html .= '<td>'.$item['example'].'</td>';
            }
            else
            {
                $html .= '<td>/</td>';
            }

            if (isset($item['desc']))
            {
                $html .= '<td>'.$item['desc'].'</td>';
            }
            else
            {
                $html .= '<td>/</td>';
            }

            $html .= '</tr>';
        }

        $html .= '</table>';

        header("Content-Type: text/html; charset=utf-8");
        echo $html;
        exit(0);
    }


    /**
     * @param $type
     * @param $data
     * @return array|bool|\Closure
     */
    private static function verifyDataType($type, $data)
    {
        if (!$type) return true;

        switch ($type)
        {
            case 'string[]':
            case 'string':
                if (is_string($data)) return true;
                break;
            case 'number[]':
            case 'number':
                if (is_numeric($data)) return true;
                break;
            case 'int':
            case 'integer':
                if (is_int($data)) return true;
                break;
            case 'bool':
            case 'boolean':
                if (is_bool($data)) return true;
                break;
            case 'float':
            case 'double':
                if (is_double($data) || is_float($data)) return true;
                break;
        }

        return array('tVal'=>$type, 'eVal'=>gettype($data));

    }

    /**
     * @param $must
     * @param $data
     * @return array|bool
     */
    private static function verifyMust($must, $data)
    {
        if ('false' === $must)
        {
            return true;
        }

        if (is_null($data))
        {
            return array('tVal'=>'参数值不能为空', 'eVal'=>'参数值为空');
        }

        return true;
    }

}